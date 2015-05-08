(function($) {

var unique = 0;
function getUnique() {
	return unique++;
}

function format_xml(str)
{
	var xml = '';

	// add newlines
	str = str.replace(/(>)(<)(\/*)/g, "$1\n$2$3");

	// split the string
	var strArr = str.split("\n");

	for (var i=0 ; i<strArr.length ; i++) {
		xml += strArr[i] + "\n";
	}

	return xml;
}

function html_entity_encode(s) {
	var myString = s;
	return myString.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
}

function html_entity_decode(s) {
	var myString = s;
	return myString.replace( /\&amp;/g, '&' ).replace( /\&lt;/g, '<' ).replace( /\&gt;/g, '>' );
}

function isEmptyXML(xml) {
	return ($.trim(getInnerXMLString(xml))=="")
}

function getInnerXMLString(xml) {
	var s = "";
	for (var i=0 ; i<xml.contents().length ; i++) {
		var node = xml.contents().get(i);
		if (node.nodeType == 4) {
			return node.data;
		} else {
			s = s + (new XMLSerializer()).serializeToString(node);
		}
	}
	return s;
}

function Item_Asset(data, hint) {
	var place;
	var value = "";
	
	function construct() {
	}
	construct();	

	this.getHeader = function() {
		return "";
	}

	this.createUI = function() {
		place = $('<div class="xml-item-asset"><textarea></textarea></div>');
		place.assetmanager("create");
		place.assetmanager("val", value);
		return place;
	};
	
	this.consumeXML = function(xml) {
		value = getInnerXMLString(xml);
		if (place) place.assetmanager("val", value);
		xml.empty(); // consumes all XML!
		return 1;
	};
	
	this.produceXML = function(xml) {
		if (place) value = place.assetmanager("val");	
		var content = $.xmlDOM("<xml>" + value + "</xml>").contents();
		xml.append(content.contents());
	};
}
	
function Item_Access(data, hint) {
	var place;
	var value = "";
	
	function construct() {
	}
	construct();	

	this.getHeader = function() {
		return "";
	};

	this.createUI = function() {
		place = $('<div class="xml-item-access"></div>');
		place.accessmanager("create");
		place.accessmanager("val", value);
		return place;
	};
	
	this.consumeXML = function(xml) {
		value = getInnerXMLString(xml);
		if (place) place.accessmanager("val", value);
		xml.empty(); // consumes all XML!
		return 1;
	};
	
	this.produceXML = function(xml) {
		if (place) value = place.accessmanager("val");
		var content = $.xmlDOM("<xml>" + value + "</xml>").contents();
		xml.append(content.contents());
	};
}

function Item_Object(data, hint) {
	var place;
	var value = "";
	
	function construct() {
	}
	construct();	

	this.getHeader = function() {
		return "";
	};

	this.createUI = function() {
		place = $('<div class="xml-item-object"></div>');
		place.objectmanager("create", data.class);
		place.objectmanager("val", value);
		return place;
	};
	
	this.consumeXML = function(xml) {
		value = getInnerXMLString(xml);
		if (place) place.objectmanager("val", value);
		xml.empty(); // consumes all XML!
		return 1;
	};
	
	this.produceXML = function(xml) {
		if (place) value = place.objectmanager("val");
		var content = $.xmlDOM("<xml>" + value + "</xml>").contents();
		xml.append(content.contents());
	};
}	
	
function Item_Null(data, hint) {
	this.getHeader = function() {};
	this.createUI = function() {};
	this.consumeXML = function(xml) {};
	this.produceXML = function(xml) {};
}

function Item_Help(data, hint) {
	var place;
	this.getHeader = function() {};
	this.createUI = function() {
		if (!place) place = $('<div class="xml-item-help">' + data.html + '</div>');
		return place;
	};
	this.consumeXML = function(xml) {};
	this.produceXML = function(xml) {};
}

function Item_Constant(data, hint) {
	var constant = $.xmlDOM("<xml>" + data + "</xml>").contents();

	function construct() {
	}
	construct();	

	this.getHeader = function() {
		return "";
	};
	
	this.createUI = function() {
		return false;
	};
	
	this.consumeXML = function(xml) {
		if ($.trim(getInnerXMLString(xml))==$.trim(getInnerXMLString(constant))) {
			xml.empty();
			return hint && hint.success ? 2 : 1;
		} else {
			return hint && hint.failure ? -1 : 0;
		}
	};
	
	this.produceXML = function(xml) {
		xml.text(data);
	};
}

var Item_Include_cache = {};
function Item_Include(data, hint) {
	var root;

	function construct() {
		if (!Item_Include_cache[data.url]) {
//			console.log(data.url);
			$.ajax({
				url: data.url,
				dataType: "json",
				async: false,
				success: function(ajaxData, textStatus) {					
					Item_Include_cache[data.url] = ajaxData;
				},
				error: function(XMLHttpRequest, textStatus, errorThrown) {
//					console.log("xmleditor include error", XMLHttpRequest, textStatus, errorThrown);
				}
			});
		}
		root = new Item_Root(Item_Include_cache[data.url], null);
	}
	construct();

	this.getHeader = function() {
		return root.getHeader();
	}
	
	this.createUI = function() {
		return root.createUI();
	}
	
	this.consumeXML = function(xml) {
		return root.consumeXML(xml);
	}
	
	this.produceXML = function(xml) {
		root.produceXML(xml);	
	}
}

function Item_Select(data, hint) {
	var items = [];
	var u = getUnique();
	
	var place;
	var tabs;
	
	var selectedIndex = -1;
	
	function construct() {
		var i;
		for (i=0 ; i<data.options.length ; i++) {
			var option = data.options[i];
			var item = new Item_Root(option.content, null);
			items.push(item);
		}	
	}
	construct();
	
	this.getHeader = function() {
		if (selectedIndex==-1) {
			return "";
		} else {
			var header = items[selectedIndex].getHeader();
			if (header == "") {
				var xml = $.xmlDOM("<xml></xml>").contents();
				items[selectedIndex].produceXML(xml);
				if (isEmptyXML(xml)) {
					return "";
				}
			}
			return "<span style='color: " + (data.options[selectedIndex].color) + "'>" + data.options[selectedIndex].label + "</span>" + (header ? " [ " + header + " ] " : "");
		}
	}	

	this.createUI = function() {
	
		if (selectedIndex==-1) selectedIndex = 0;
	
		place = $('<div class="xml-item-select"></div>');
		// create tabs
		tabs = $('<div><ul></ul></div>');
		// add the elements
		var i;
		for (i=0 ; i<data.options.length ; i++) {
			var id = 'tabs-' + u + '-' + i;
			var option = data.options[i];
			var item = items[i];
	
			var tab = $('<div id="' + id + '"></div');
			item.tab = tab;
			tabs.append(tab);
			tabs.find('ul').eq(0).append('<li><a href="#' + id +'">' + option.label + '</a></li>');

			if (i==selectedIndex) {
				if (!item.UI) {
					item.UI = item.createUI();
					item.tab.html(item.UI);
				}
			}
		}

		$('body').append(tabs);
		tabs.tabs({
			select: function(event, ui) {
				selectedIndex = ui.index;
				var item = items[selectedIndex];
				if (!item.UI) {
					item.UI = item.createUI();
					item.tab.html(item.UI);
				}
			}
		});

		// open the selected element
		tabs.tabs('option', 'selected', selectedIndex);		
		
		place.append(tabs);
		
		return place;
	}
	
	this.consumeXML = function(xml) {
	
		if (selectedIndex==-1) selectedIndex = 0;
	
		var cloneXml;
		var testLength;
		var selectedLength = -1;
		var length = getInnerXMLString(xml).length;

		var i;
		for (i=0 ; i<items.length ; i++) {
			cloneXml = xml.clone();
			var result = items[i].consumeXML(cloneXml);
			items[i] = new Item_Root(data.options[i].content, null);
			if (tabs) {
				items[i].tab = tabs.find('#tabs-' + u + '-' + i);
			}
			if (result<1) {
				continue;
			}
			if (result==2) {
				selectedLength = length;
				selectedIndex = i;
				break;
			}
			testLength = length - getInnerXMLString(cloneXml).length;
			if (testLength > selectedLength) {
				selectedLength = testLength;
				selectedIndex = i;
			}
		}
		if (selectedLength>-1) {
			var item = items[selectedIndex];
			var r = item.consumeXML(xml);
			if (tabs) {
				tabs.tabs('option', 'selected', selectedIndex);
				if (!item.UI) {
					item.UI = item.createUI();
					item.tab.html(item.UI);
				}
			}
			return r;
		} else {
			return 0;
		}
	}
	
	this.produceXML = function(xml) {
		if (selectedIndex!=-1) {
			items[selectedIndex].produceXML(xml);
		}
	}
}

function Item_List(data, hint) {

	var items;
	var place;
	
	function construct() {
	}
	construct();	
	
	this.getHeader = function() {
		if (!items) return "";
		return "" + items.length + " item" + (items.length == 1 ? "" : "s");
	}
	
	function setHeader(item) {
		var tmp = $('<span class="header-text"></span>');
		var s = item.getHeader();
		if (!s) s = "N/A";
		tmp.append($("<span>" + s + "</span>"));
		var del = $('<span class="action_icon small-button" title="Delete item"><img src="../css/page_white_delete.png"></span>');
		del.click(function(e) {
			e.cancelBubble = true;
			e.stopPropagation();
			var answer = confirm('Are you sure?');
			if (answer) {
				for (var i=0 ; i<items.length ; i++) {
					if (items[i]==item) {
						items.splice(i, 1);
						refresh(false);
						return false;
					}
				}
			}
			return false;
		});
		tmp.append(del);
		var copy = $('<span class="action_icon small-button" title="Copy item"><img src="../css/page_white_copy.png"></span>');
		copy.click(function(e) {
			e.cancelBubble = true;
			e.stopPropagation();
			for (var i=0 ; i<items.length ; i++) {
				if (items[i]==item) {
					var xml = $.xmlDOM("<xml></xml>").contents();
					item.produceXML(xml);
					var newItem = new Item_Root(data.content, null);		
					newItem.consumeXML(xml);
					items.splice(i + 1, 0, newItem);
					refresh(i + 1);
					return false;
				}
			}
			return false;
		});
		tmp.append(copy);
		var add = $('<span class="action_icon small-button" title="Insert item"><img src="../css/page_white_add.png"></span>');
		add.click(function(e) {
			e.cancelBubble = true;
			e.stopPropagation();
			for (var i=0 ; i<items.length ; i++) {
				if (items[i]==item) {
					var xml = $.xmlDOM("<xml></xml>").contents();
					var newItem = new Item_Root(data.content, null);
					newItem.consumeXML(xml);
					items.splice(i + 1, 0, newItem);
					refresh(i + 1);
					return false;
				}
			}
			return false;
		});
		tmp.append(add);
		item.header.find("a").html(tmp);
	}
		
	function refresh(index) {
		var i;
		
		if (!items) {
			items = [];
		}
	
		// "rescue" items' jQuery objects to temp div, 
		// as their "home" div will be destroyed in accordion recreation
		var tmp = $("<div></div>").appendTo($('body'));
		if (items) {
			for (i=0 ; i<items.length ; i++) {
				var item = items[i];
				if (item.UI) tmp.append(item.UI);
			}
		}
		
		// empty place and create new html_items container
		var html_items = $("<div></div>");
		place.empty().append(html_items);

		// move the items' jQuery objects to the new html_items container
		for (i=0 ; i<items.length ; i++) {
			var item = items[i];
			var html_item = $("<div class='item'></div>");
			$.data(html_item.get(0), "xmleditor_list_item", item);
			
			var header = $("<h3><a href='#'></a></h3>");
			
			var content = $("<div></div>");			

			if (!item.UI && i===index) {
				item.UI = item.createUI();
			}
			if (item.UI) {
				content.append(item.UI);
			}
			
			item.header = header;
			item.content = content;
			
			setHeader(item);
			
			html_item.append(header);
			html_item.append(content);
			html_items.append(html_item);
		}
		
		// remove the temp div
		tmp.remove();
		
		var dragAction = "";
		
		var action_delete = $('<div class="action_delete">Drag to delete</div>').sortable({
			over: function(event, ui) {
				dragAction = "delete";
				ui.helper.css("opacity", "0.5");
			}
		}).css("opacity", "0.33");
//		place.append(action_delete);

		var action_copy = $('<div class="action_copy">Drag to copy</div>').sortable({
			over: function(event, ui) {
				dragAction = "copy";
				ui.helper.css("opacity", "1.0");
			}
		}).css("opacity", "0.33");
//		place.append(action_copy);
				
		var action_create = $('<div class="action_create">Create new</div>').click(function() {
			var item = new Item_Root(data.content, null);
			items.push(item);
			refresh(items.length - 1);
		}).css("opacity", "1.0");
		place.append(action_create);
		
		html_items.accordion({
			header: "> div > h3",
			active: index,
			heightStyle: "content",
			collapsible: true,
			animate: {
				duration: 150,
				easing: "swing"
			},
			beforeActivate: function(event, ui) {
				if (ui.newHeader.length>0) {
					// when accordion opens, disable sortable
					html_items.sortable('option', 'cancel', 'div');
					
					// (re)create UI for new element
					var item = $.data(ui.newHeader.parent().get(0), "xmleditor_list_item");
					if (item.content.html()=="") {
						if (!item.UI) item.UI = item.createUI();					
						item.content.html(item.UI);
					}
					
					setHeader(item);
				}
				
				if (ui.oldHeader.length>0) {
					// set header for old element
					var item = $.data(ui.oldHeader.parent().get(0), "xmleditor_list_item");
					setHeader(item);
				}
			},
			activate: function(event, ui) {
				if (ui.newHeader.length==0) {
					// when accordion closes, activate sortable
					html_items.sortable('option', 'cancel', false);
				}
			}
		}).sortable({
			handle: "h3",
			axis: "y",
			distance: 15,
			connectWith: '.action_delete, .action_copy',
			start: function(event, ui) {
				action_delete.css("opacity", "1.0");
				action_copy.css("opacity", "1.0");
				action_create.css("opacity", "0.1");
			},
			stop: function(event, ui) {
				if (dragAction=="copy") {
					refresh(false);
				} else if (dragAction=="cancel") {
					refresh(false);
				} else {
					items = [];
					html_items.find('> div').each(function(index) {
						var item = $.data(this, "xmleditor_list_item")
						if (item) items.push(item);
					});
					refresh(false);
				}
			},
			over: function(event, ui) {
				dragAction = "";
				ui.helper.css("opacity", "1.0");
			},
			beforeStop: function(event, ui) {
				if (dragAction=="delete") {
					ui.helper.hide();
					var answer = confirm('Delete "' + ui.helper.find("a").html() + '"?');
					if (!answer) {
						dragAction = "cancel";
					}
				}
				if (dragAction=="copy") {
					var item = $.data(ui.item.get(0), "xmleditor_list_item");
					var xml = $.xmlDOM("<xml></xml>").contents();
					item.produceXML(xml);
					var newItem = new Item_Root(data.content, null);		
					newItem.consumeXML(xml);
					items.push(newItem);
				}
			},
			update: function(event, ui) {
			}
		});
	}
	
	this.createUI = function() {
		place = $('<div class="xml-item-list"></div>');
		refresh(false);
		return place;
	}
	
	this.consumeXML = function(xml) {
		items = [];

		var item;
		var before;
		var after;
		var retVal = 0;

		var failed = false;
		while (!failed) {
		
			item = new Item_Root(data.content, null);
			var result = item.consumeXML(xml);
			if (result>0) retVal = 1;
			
			if (result<1) {
				failed = true;
			} else {
				items.push(item);
			}
		}
		
		if (place) refresh(false);
		
		return retVal;
	}
	
	this.produceXML = function(xml) {
		var i;
		if (items) {
			for (i=0 ; i<items.length ; i++) {
				if (items[i]) items[i].produceXML(xml);
			}
		}
	}
}

function Item_Attribute(data, hint) {
	var root;
	
	function construct() {
		root = new Item_Root(data.content, null);
	}
	construct();
	
	this.getHeader = function() {
		return root.getHeader();
	}

	this.createUI = function() {
		var place = $('<div class="xml-item-attribute"></div>');
		place.append(root.createUI());
		return place; 
	}
	
	this.consumeXML = function(xml) {
		var tmp = xml.attr(data.name);
		if (!tmp) tmp = "";
		var content = $.xmlDOM("<xml>" + tmp + "</xml>").contents();
		var result = root.consumeXML(content);
		if (result>0) {
			xml.removeAttr(data.name);
		}
		return result;
	}
	
	this.produceXML = function(xml) {
		var result = $.xmlDOM("<xml/>").contents();
		root.produceXML(result);
		var innerXML = $.trim(getInnerXMLString(result));
		if (innerXML) {
			xml.attr(data.name, innerXML);
		}
	}	
}

function Item_Boolean(data, hint) {
	var input;
	var value;
	
	function construct() {
	}
	construct();

	this.getHeader = function() {
		if (!value) return "";
		return "<i>" + (value == "true" ? "Yes" : "No") + "</i>";
	}
	
	this.createUI = function() {
		var place = $('<div class="xml-item-boolean"></div>');
		input = $('<select><option value="">---Choose---</option><option value="true">Yes</option><option value="false">No</option></select>');
		input.val(value);
		place.append(input);
		return place;
	}
	this.consumeXML = function(xml) {
		value = getInnerXMLString(xml);
		if (input) input.val(value);
		xml.empty();
		return 1;
	}
	this.produceXML = function(xml) {
		if (input) value = input.val();
		xml.text(value);
	}
}

function Item_Text(data, hint) {	

	var input;
	var value = "";
	
	function construct() {
	}
	construct();

	this.getHeader = function() {
		if (input) value = input.val();
		if (data && data.options) {
			for (i=0 ; i<data.options.length ; i++) {
				if (value==data.options[i].value) {
					return data.options[i].label;
				}
			}
		}
		if (value == "") return "";
		var s = value.replace("\n", "");
		if (s.length > 32) {
			s = s.substr(0, 32) + "..."
		}
		return "<i>" + s + "</i>";
	}
	
	this.createUI = function() {

		if (data && data.multiline) {
			input = $('<textarea name="text_' + getUnique() + '"></textarea>');
		} else {
			input = $('<input type="text" name="text_' + getUnique() + '"></input>');
		}
		input.val(value);
				
		var closing = false;
		if (data && data.options) {
			input.autocomplete({
				source: function(request, response) {
					var matcher = new RegExp("" + $.ui.autocomplete.escapeRegex(request.term), "i");
					response($.grep(data.options, function(item) {
						return matcher.test(item.value) || matcher.test(item.label);
					}));
				},
				minLength: 0,
				close: function() {
					// avoid double-pop-up issue
					closing = true;
					setTimeout(function() { closing = false; }, 300);
				}
			});
			input.focus(function() {
				if (!closing) $(this).autocomplete("search");			
			});
		}
		
		return input;
	}
	this.consumeXML = function(xml) {
		value = getInnerXMLString(xml);
		if (input) input.val(value);
		xml.empty();
		
		if (hint && hint.success) return 2;
		return 1;
	}
	this.produceXML = function(xml) {
		if (input) {
			value = input.val();
		}
		if (value) {
			/*
			if (value.indexOf("&") > -1 ||
				value.indexOf("<") > -1 ||
				value.indexOf(">") > -1) {
			}
			*/
			var s = value;
			s = "<![CDATA[" + value + "]]>";
			var content = $.xmlDOM("<xml>" + s + "</xml>").contents();
			xml.append(content.contents());
		}
	}
}

function Item_Node(data, hint) {

	var item;
	var errorCatcher;
	var errorCatcherContent;
	
	var place;
	
	function construct() {
		item = new Item_Root(data.content, null);
		item.delay = true;
	}
	construct();

	this.getHeader = function() {
		return item.getHeader();
	}
	
	function setHeader(item) {
		var tmp = $('<span class="header-text"></span>');
		var s = item.getHeader();
		if (!s) s = "N/A";
		tmp.append($("<span>" + s + "</span>"));
		item.header.find("a").html(tmp);
	}	

	this.createUI = function() {
		place = $('<div class="xml-item-node"></div>');
		if (data.delay) {

			// "rescue" items' jQuery objects to temp div, 
			// as their "home" div will be destroyed in accordion recreation
			var tmp = $("<div></div>").appendTo($('body'));
			if (item.UI) tmp.append(item.UI);
			
			// empty place and create new html_items container
			var html_items = $("<div></div>");
			place.empty().append(html_items);
			
			var html_item = $("<div class='item'></div>");
			$.data(html_item.get(0), "xmleditor_node_item", item);
			
			var header = $("<h3><a href='#'></a></h3>");
			var content = $("<div></div>");			

			item.header = header;
			item.content = content;
			
			setHeader(item);

			html_item.append(header);
			html_item.append(content);
			html_items.append(html_item);
			
			// remove the temp div
			tmp.remove();
			
			html_items.accordion({
				header: "> div > h3",
				active: false,
				heightStyle: "content",
				collapsible: true,
				animate: {
					duration: 150,
					easing: "swing"
				},
				beforeActivate: function(event, ui) {
					if (ui.newHeader.length>0) {					
						// (re)create UI for new element
						var item = $.data(ui.newHeader.parent().get(0), "xmleditor_node_item");
						if (item.content.html()=="") {
							if (!item.UI) item.UI = item.createUI();					
							item.content.html(item.UI);
						}
						setHeader(item);
					}
					if (ui.oldHeader.length>0) {
						// set header for old element
						var item = $.data(ui.oldHeader.parent().get(0), "xmleditor_node_item");
						setHeader(item);
					}
				}
			});
		} else {
			place.append(item.createUI());
		}
		
		if (data.errorCatcher) {
			errorCatcher = $("<div><h3 style='color: red'>XML parse error!</h3><textarea style='width: 200px; height: 50px;'></textarea></div>");
			if (errorCatcherContent) {
				errorCatcher.show().find("textarea").val(errorCatcherContent);
			} else {
				errorCatcher.hide();
			}
			place.append(errorCatcher);
		}
		
		return place; 
	}	
	
	this.consumeXML = function(xml) {
		var content = xml.find("> " + data.name);
		if (content.length>0) {
			content = content.eq(0);
			if (data.delay) {
				item.consumeXML(content, true);
				content.remove();
				return 1;
			}
			var result = item.consumeXML(content);
			if (result==-1) {
				return -1;
			}
			if (isEmptyXML(content)) {
				if (errorCatcher) {
					errorCatcher.find("textarea").val("").hide();
				}
				content.remove();
				return Math.max(1, result);
			} else {
				if (data.errorCatcher) {
					errorCatcherContent = $.trim(getInnerXMLString(content));
					if (errorCatcher) {
						errorCatcher.find("textarea").val(errorCatcherContent).show();
					}
					content.remove();
					return Math.max(1, result);
				}
				return 0;
			}
		} else {
			return 0;
		}
	}
	
	this.produceXML = function(xml) {
		var result = $.xmlDOM("<" + data.name + "/>").contents();
		item.produceXML(result);
		// if node XML or attributes have changed, add to the result XML tree
		var innerXML = $.trim(getInnerXMLString(result));
		var attributes = result.get(0).attributes.length;
		if (innerXML!="" || attributes>0) {
			xml.append(result);
		}
	}
}

function Item_Root(data, hint) {

	var components = [];
	
	this.delay = false;
	var delayedXML = null;

	this.getHeader = function() {
		var i;
		var s = "";
		for (i=0 ; i<data.length ; i++) {
			if (components[i]) {
				var header = components[i].getHeader();
				if (header) {
					if (s != "") s = s + ", ";
					s = s + header;
				}
			}
		}
		if (delayedXML != null) {
			if (s == "") {
				for (i=0 ; i<delayedXML.contents().length ; i++) {
					var node = delayedXML.contents().get(i);
					if (node.nodeType == 4) {
						s = node.data;
						break;
					} else if (node.nodeType == 3) {
						s = s + $.trim((new XMLSerializer()).serializeToString(node));
					}
				}
				if (s=="") {
					s = "...";
				}
				if (s.length > 32) {
					s = s.substr(0, 32) + "...";
				}
			}
			s = "(" + s + ")";
		}
		return s;
	}
	
	this.createUI = function() {
		this.delay = false;
		if (delayedXML) {
			this.consumeXML(delayedXML);
		}
		delayedXML = null;
		var place = $("<div><div>");
		var i;
		for (i=0 ; i<data.length ; i++) {
			if (!components[i]) {
				var item = createItem(data[i], data[i].type, data[i].data, data[i].hint);
				components[i] = item;
			}
			place.append(components[i].createUI());
		}
		return place;
	}
	
	this.consumeXML = function(xml, success) {
		var i;
		var retVal = 0;
		if (this.delay) {
			delayedXML = xml.clone();
			if (success) {
				xml.empty();
				return 1;
			}
		}
		for (i=0 ; i<data.length ; i++) {
			if (!components[i]) {
				var item = createItem(data[i], data[i].type, data[i].data, data[i].hint);
				components[i] = item;
			}
			var result = components[i].consumeXML(xml);
			if (result==-1) {
				return -1;
			}
			if (result==2 && this.delay) {
				if (isEmptyXML(xml)) {
					this.delay = false;
					delayedXML = null;
				} else {
					xml.empty();
				}
				return 2;
			}
			retVal = Math.max(retVal, result);
		}
		delayedXML = null;
		return retVal;
	}
	
	this.produceXML = function(xml) {
		var i;
		if (delayedXML) {
			var tmp = delayedXML.clone();
			xml.append(tmp.contents());
			var g = delayedXML.get(0);
			for (i=0 ; i < g.attributes.length ; i++) {
				xml.attr(g.attributes[i].nodeName, g.attributes[i].nodeValue);
			}
		} else {
			for (i=0 ; i<components.length ; i++) {
				components[i].produceXML(xml);
			}
		}
	}	
}

function ItemWrapper(data, item) {

	this.data = data;
		
	this.getHeader = function() {
		return item.getHeader();
	}
		
	this.createUI = function() {
//		var start = new Date();
		var place = $();
		if (data.type == "list") {
			var fieldset = $("<fieldset class='xml-item-wrapper'></fieldset>");
			if (data.label) {
				fieldset.append($('<legend>' + data.label + '</legend>'));
			}
			place = fieldset.append(item.createUI());
		} else {
			place = $('<div class="xml-item-wrapper"></div>');
			if (data.label) {
				place = place.append($('<label>' + data.label + '</label>'));
			}
			place.append(item.createUI());
		} 
		
//		var end = new Date();
//		var time = end.getTime() - start.getTime();
//		console.log("createUI " + data.type, data, time);
		return place;
	}
	
	this.consumeXML = function(xml) {
//		var start = new Date();
		var result = item.consumeXML(xml);
//		var end = new Date();
//		var time = end.getTime() - start.getTime();
//		console.log("consumeXML " + data.type, data, time);
		return result;
	}
	
	this.produceXML = function(xml) {
//		var start = new Date();
		item.produceXML(xml);
//		var end = new Date();
//		var time = end.getTime() - start.getTime();
//		console.log("produceXML " + data.type, data, time);
	}
}

function createItem(wrapperData, type, data, hint) {
//	var start = new Date();
	var item;
	switch(type) {
		case "include":
			item = new Item_Include(data, hint);
			break;
		case "constant":
			item = new Item_Constant(data, hint);
			break;
		case "help":
			item = new Item_Help(data, hint);
			break;
		case "root":
			item = new Item_Root(data, hint);
			break;
		case "node":
			item = new Item_Node(data, hint);
			break;
		case "boolean":
			item = new Item_Boolean(data, hint);
			break;
		case "text":
			item = new Item_Text(data, hint);
			break;
		case "attribute":
			item = new Item_Attribute(data, hint);
			break;
		case "select":
			item = new Item_Select(data, hint);
			break;
		case "list":
			item = new Item_List(data, hint);
			break;
		case "asset":
			item = new Item_Asset(data, hint);
			break;
		case "access":
			item = new Item_Access(data, hint);
			break;
		case "object":
			item = new Item_Object(data, hint);
			break;
		default:
			item = new Item_Null(data, hint);
			break;
	}
//	var end = new Date();		
//	var time = end.getTime() - start.getTime();
//	console.log("createItem " + type, data, time);		
	return new ItemWrapper(wrapperData, item);
}

function createCodemirror(textfield) {
	
	var tfield = document.getElementById(textfield);
	
	var c = CodeMirror.fromTextArea(tfield, {
		indentUnit: 4,
		theme: 'eclipse',
		lineNumbers: true,
	});
	
	return c;
}

$.fn.xmleditor = function(p1, p2) {

	if (p1=='tab') {
		try {
			$(this).find(".xmleditor-wrapper div").tabs("select", p2);
		} catch (e) {
			// throws an error for some reason...
		}
	}

	if (p1=='templates') {
		return $(this).find(".xmleditor-template");
	}

	if (p1=='val') {
		if (p2) {
			this.each(function(index) {
				var root = $.data(this, "xmleditor_root");
				root.consumeXML($.xmlDOM("<xml>" + p2 + "</xml>").contents());
			});
			return;
		} else {
			var root = $.data(this.get(0), "xmleditor_root");
			var xml = $.xmlDOM("<xml></xml>").contents();
			root.produceXML(xml);
			return getInnerXMLString(xml);
		}
	}

	if (p1=='load' || p1=='create') {
		this.each(function(index) {	
		
			var u = getUnique();
		
			//var xml = $.parseXML("<xml>" + $(this).find("textarea").val() + "</xml>");
			var xml = $.xmlDOM("<xml>" + $(this).find("textarea").val() + "</xml>").contents();
			$(this).empty();
			
			var root;
			if (p1=='load') {
				root = new Item_Include({"url": p2});
			} 
			if (p1=='create') {
				root = new Item_Root(p2, null);
			}
			$.data(this, "xmleditor_root", root);
			
			root.consumeXML(xml);
			
			var wrapper = $("<div class='xmleditor-wrapper'></div>");
			var tabs = $("<div><ul><li><a href='#xmleditor-editor-" + u + "'><span>Editor</span></a></li><li><a href='#xmleditor-templates-" + u + "'><span>Templates</span></a></li><li><a href='#xmleditor-source-" + u + "'><span>Developer</span></a></li></ul><div id='xmleditor-editor-" + u + "'></div><div class='xmleditor-template' id='xmleditor-templates-" + u + "'></div><div id='xmleditor-source-" + u + "' class='xmleditor-source'><h3>XML Source</h3><div id='source-div'></div><button href='#' class='small-button' id='apply-xml'>Apply</button></div></div>");
			wrapper.append(tabs);
			// <pre class='prettyprint lang-xml'></pre>

			$(this).empty().append(wrapper);
			var c0;

			$('#apply-xml').click(function() {
				c0.save();

				var content = $('#xml-source-area').val();

				if (content != "") {
					var answer = confirm("Are you sure?");
					if (answer) root.consumeXML($.xmlDOM("<xml>" + content + "</xml>").contents());
				}
				tabs.tabs("select", 0);
				return false;
			});

			tabs.tabs({
				
				selected: 0,
				select: function(event, ui) {
					if (ui.index==0) {

					}
					if (ui.index==2) {
						tabs.find("#source-div").empty();
						tabs.find("#source-div").append("<textarea id='xml-source-area'></textarea>");

						var xml = $.xmlDOM("<xml></xml>").contents();
						root.produceXML(xml);
						
						var content = format_xml(getInnerXMLString(xml));

						setTimeout(function() {
							var params = {
								indentUnit: 4,
								tabSize: 4,
								indentWithTabs: true,
								lineNumbers: true,
								theme: 'eclipse'
							};
						
							c0 = CodeMirror.fromTextArea(document.getElementById("xml-source-area"), params);
							c0.setValue(content);
							
							var last = c0.lineCount(); 
							c0.operation(function() { 
								for (var i = 0; i < last; ++i) {
									c0.indentLine(i); 
								}
							});
							
							// below line messes up with <tag>content</tag> to contain too many line breaks and tabs
							//c0.autoFormatRange(c0.posFromIndex(0), c0.posFromIndex(999999999));
						}, 0);
						
						//var content = html_entity_encode(format_xml(getInnerXMLString(xml)));
						//tabs.find("#xmleditor-source pre").html(content);
						//prettyPrint();
					} else {
						//tabs.find(".old").empty();
						//tabs.find(".new").empty();
					}
				}
			});
									
			tabs.find("#xmleditor-editor-" + u).html(root.createUI());
		});
	}
}

})(jQuery);
jQuery.assetmanager = {
	baseUrl: "",
	config: {}
};

(function($) {

	function ext(url) {
		return (url = url.substr(1 + url.lastIndexOf("/")).split('?')[0]).substr(url.lastIndexOf(".") + 1);
	}

	function implode (glue, pieces) {
		var i = '', retVal='', tGlue='';
		if (arguments.length === 1) {
			pieces = glue;
			glue = '';
		}
		if (typeof(pieces) === 'object') {
			if (pieces instanceof Array) {
				return pieces.join(glue);
			}
			else {
				for (i in pieces) {
					retVal += tGlue + pieces[i];
					tGlue = glue;
				}
				return retVal;
			}
		}
		else {
			return pieces;
		}
	}

	function explode (delimiter, string, limit) {
		var emptyArray = { 0: '' };
		if ( arguments.length < 2 ||
			typeof arguments[0] == 'undefined' ||
			typeof arguments[1] == 'undefined' )
		{
			return null;
		}
		if ( delimiter === '' ||
			delimiter === false ||
			delimiter === null )
		{
			return false;
		}
		if ( typeof delimiter == 'function' ||
			typeof delimiter == 'object' ||
			typeof string == 'function' ||
			typeof string == 'object' )
		{
			return emptyArray;
		}
	 
		if ( delimiter === true ) {
			delimiter = '1';
		}
		
		if (!limit) {
			return string.toString().split(delimiter.toString());
		} else {
			var splitted = string.toString().split(delimiter.toString());
			var partA = splitted.splice(0, limit - 1);
			var partB = splitted.join(delimiter.toString());
			partA.push(partB);
			return partA;
		}
	}

	function getInnerXMLString(xml) {
		var s = "";
		for (var i=0 ; i<xml.contents().length ; i++) {
			s = s + (new XMLSerializer()).serializeToString(xml.contents().get(i));
		}
		return s;
	}
	
	function getExtensionType(extension) {
		switch (extension) {
			case "jpeg":
			case "jpg":
			case "png":
			case "gif": 
			case "svg": 
				return "image";
			case "mp3":
				return "audio";
			case "flv":
			case "f4v":
			case "m4v":
			case "mp4":
				return "video";
			case "swf":
				return "flash";
			default:
				return "file";
		}
	}

	function updateIcon(iconDiv) {
		
		var xml = $.data(iconDiv.get(0), "assetmanager_xml");
			
//		console.log("updateIcon", iconDiv, xml);
	
		var asset = {
			type: xml.find("type:first").text(),
			value: xml.find("value:first").text(),
			parameters: getInnerXMLString(xml.find("parameters:first"))
		};
		
		var url;
		var html;
		
		if (asset.type=="url") {
			url = asset.value;
		} else if (asset.type) {
			if ($.assetmanager.config[asset.type]) {
				url = $.assetmanager.config[asset.type].urlPrefix + asset.value;
			} else {
				html = ('Error: File type "' + asset.type + '" not found!');
			}
		} else {
			html = ('<span class="chooseAsset">N/A</span>');
		}
		
		var details = '<span>' + asset.type + ': ' + asset.value + '</span>';	
		
		if (url) {
			// get file type using file extension
			var tmp = url.split(".");			
			switch (getExtensionType(tmp[tmp.length - 1])) {
				case "image":
					//html ='<img border="0" src="' + url + '" width="50" height="50" />';
					html ='<img border="0" src="' + $.assetmanager.baseUrl + 'icon_image.png" />';
					break;
				case "audio":
					html ='<img border="0" src="' + $.assetmanager.baseUrl + 'icon_audio.png" />';
					break;
				case "video":
					html = '<img border="0" src="' + $.assetmanager.baseUrl + 'icon_video.png" />';
					break;
				case "flash":
					html = '<img border="0" src="' + $.assetmanager.baseUrl + 'icon_flash.png" />';
					break;	
				case "file":
					html = '<img border="0" src="' + $.assetmanager.baseUrl + 'icon_file.png" />';
					details = '<span>Error: File not recognized!</span>';
					break;
			}
						
		}
		
		var button = $('<div class="assetButton">' + html + '</div>');
		
		iconDiv.empty().append(button).append(details);
		
		if (asset.parameters) {
			iconDiv.append('<div class="hasparameters">*</div>');
		}
		
		// ikonin klikkaus
		iconDiv.find('.assetButton:first').unbind('click').click(function() {
			
			var path = "";

			if (!asset.type) {
				asset.type = "url";
			}
			if (asset.value) {
				var tmp = explode('/', asset.value);
				tmp.pop();
				path = implode('/', tmp);
			}
			
			var typeSelection = $("<select class='typeSelection'></select>");
			typeSelection.append("<option" + (asset.type == 'url' ? " selected='selected'" : "") + " value='" + 'url' + "'>" + 'url' + "</option>");
			$.each($.assetmanager.config, function(i) {
				typeSelection.append("<option" + (asset.type == i ? " selected='selected'" : "") + " value='" + i + "'>" + i + "</option>");
			});
			var typeLabel = $("<label>Asset type</label>");
			typeLabel = typeLabel.add(typeSelection);
			var filters = $("<div class='filters'><label>Filters</label><input type='checkbox' name='filter' value='image' id='filter-image'><label for='filter-image' class='filter-label'>image</label><input type='checkbox' name='filter' value='audio' id='filter-audio'><label for='filter-audio' class='filter-label'>audio</label><input type='checkbox' name='filter' value='video' id='filter-video'><label for='filter-video' class='filter-label'>video</label><input type='checkbox' name='filter' value='flash' id='filter-flash'><label for='filter-flash' class='filter-label'>flash</label></div>");
			
			var dialog = $('<div class="assetmanager-dialog"></div>');
			dialog.append(typeLabel);
			dialog.append('<div class="address-bar"><div class="back"></div><div class="path"><input type="text" value="' + path + '" disabled="disabled" /></div></div>');
			dialog.append(filters);
			dialog.append('<div class="listing"><ul></ul></div>');
			var details = $('<div class="details"></div>');
			dialog.append(details);
			var buttons = $('<div class="buttons"></div>');
			dialog.append(buttons);
						
			filters.find("input").change(function() {
				updateDialog();	
			}); 			
			
			typeSelection.change(function() {
				asset.value = "";
				path = "";
				updateDialog();
			}); 
			
			dialog.dialog({
				modal: true,
				closeOnEscape: true,
				title: 'AssetManager',
				width: 950,
				minHeight: 300,
				maxHeight: 600,
				close: function(){
					dialog.remove();
				}
			});
			
			function updateDetails(fileType, w, h, assetType, assetValue, fileUrl) {
				var itemDetails = $('<div class="details-preview"></div>');

				if (fileType == 'file') {
					itemDetails.append('<div class="details-unknown">Unknown file format!</div>');
						 
				} else if (fileType == 'image') {
					
					var newW = w;
					var newH = h;
					var ratio = w / h;
						
					var scale = false;
					if (newW > 355) {
						newW = 355;
						newH = newW / ratio;
						scale = true;
					}
					if (newH > 355){
						newH = 355;
						newW = newH * ratio;
						scale = true;
					}
					
					console.log("ratio", ratio, w, h, newW, newH);
					
					var html = "<div><img width='" + newW + "' height='" + newH + "' src='" + fileUrl + "' />";
					if (scale){
						html += "<br/><b style='color: red; font-weight: bold; font-size: 14px;'>Kuvaa skaalattu pienemmäksi!</b>";
					}
					html += "</div>";
					itemDetails.append(html);
						 
				} else if (fileType == 'audio') {
					var player = $("<div class='videoplayer';'></div>");
					itemDetails.append(player);
					player.flowplayer($.assetmanager.baseUrl + "flowplayer-3.1.5.swf", 
						{
							clip: {
								url: fileUrl,
								autoPlay: true,
								autoBuffering: true
							},
							plugins: { 
								controls: { 
									fullscreen: false, 
									height: 20, 
									play: true, 
									pause: true,
									stop: false, 
									volume: false, 
									time: true, 
									mute: false, 
									scrubber: false
								}
							}
						}
					);

				} else if (fileType == 'video') {
					var player = $("<div class='videoplayer'></div>");
					itemDetails.append(player);
					
					console.log("player" + player);
					
					player.flowplayer($.assetmanager.baseUrl + "flowplayer-3.1.5.swf", 
						{
							clip: {
								url: fileUrl,
								autoPlay: true,
								autoBuffering: true
							},
							plugins: { 
								controls: { 
									fullscreen: false, 
									height: 20, 
									play: true,
									pause: true,
									stop: false, 
									volume: false, 
									time: true, 
									mute: false, 
									scrubber: true
								}
							}
						}
					);
						 
				} else if (fileType == 'flash') {
					var flashContainer = $("<div></div>").flash({
						swf: fileUrl,
						width: 355,
						height: 355
					});
					itemDetails.append(flashContainer);
					
				} 										
				
				var parameters = $("<div class='parameters'><label>Parameters</label><textarea>" + asset.parameters  + "</textarea></div>");
				
				var chooseButton = $("<a href='#' class='big-button'>Select this</a>");
				chooseButton.click(function() {										
					var xml = $.xmlDOM("<xml><type>" + assetType + "</type><value>" + assetValue + "</value><parameters>" + parameters.find('textarea').val() + "</parameters></xml>").contents();
					$.data(iconDiv.get(0), "assetmanager_xml", xml);
					updateIcon(iconDiv);
					dialog.dialog('close');	
					
					return false;
				});
				
				var removeButton = $("<a href='#' class='big-button'>Empty selection</a>");
				removeButton.click(function() {
					var xml = $.xmlDOM("<xml></xml>").contents();
					$.data(iconDiv.get(0), "assetmanager_xml", xml);
					updateIcon(iconDiv);
					dialog.dialog('close');
					
					return false;
				});
				
				details.empty();
				details.append(itemDetails);
				details.append(parameters);
				details.append(chooseButton);
				details.append("&nbsp;");
				details.append(removeButton);
			}

			function updateDialog() {
						
				var assetType = typeSelection.find("option:selected").val();
				
				if (assetType=="url") {
				
					dialog.find(".listing ul").empty();
				
					dialog.find("div.path input").removeAttr("disabled");
					dialog.find("div.path input").val(asset.value);
					dialog.find("div.back").empty();
					var backlink = $("<a href='#' title='back' class='small-button'>&gt;</a>");
					backlink.click(function() {
						asset.value = dialog.find("div.path input").val();
						updateDialog();
						
						return false;
					});	
					dialog.find("div.back").append(backlink);
					
					updateDetails(getExtensionType(ext(asset.value)), 100, 100, assetType, asset.value, asset.value);
					
				} else {
				
					dialog.find("div.path input").attr("disabled", "disabled");
				
					var serverRoot = $.assetmanager.config[assetType].serverRoot;
					var urlPrefix = $.assetmanager.config[assetType].urlPrefix;
				
					// remove leading slash from path
					if (path.substring(0,1)=='/') path = path.substring(1);
					if (path) {
						dialog.find("div.path input").val(path);
					} else {
						dialog.find("div.path input").val('');
					}
					
					dialog.find("div.back").empty();	
					var backPath = "";
					var tmp = explode('/', path);
					if (tmp.length > 1) {
						tmp.pop();
						backPath = implode("/", tmp);
					}
					var backlink = $("<a href='#' title='back' class='small-button'>&lt;</a>");
					backlink.click(function() {
						path = backPath;
						updateDialog();
						
						return false;
					});	
					dialog.find("div.back").append(backlink);
					
					var fileTypes = [];
					fileTypes[0] = "all";
					dialog.find(".filters input:checked").each(function(i) {
						fileTypes[i] = $(this).val();
					});
					
					dialog.find(".listing ul").empty();
					details.empty();
					
					$.ajax({
						type: "POST",
						url: $.assetmanager.baseUrl + 'ls.php',
						dataType: "json",
						data: {
							"path": serverRoot + path, 
							"fileTypes": fileTypes
						},
						success: function(data) {

						
							if (data.length==0){
								dialog.find('.listing ul').append($('<li></li>').append("<b>Ei osumia</b>"));
								return;
							}
							
							for (var i in data) {
								function kikka() { // variable scope kikka

									var itemIcon = $('<a href="#"></a>');							
									dialog.find('.listing ul').append($('<li></li>').append(itemIcon));
								
									if (data[i].kind=='directory') {
										var directoryName = data[i].name;
										itemIcon.append('<span class="thumbHolder"><img border="0" src="' + $.assetmanager.baseUrl + 'icon_folder.png" /></span><p class="desc"><span class="dirName">' + directoryName + '</span></p>');
										itemIcon.click(function() {
											path = path + "/" + directoryName;
											updateDialog();
											
											return false;
										});
										
									} else {
									
										var filePath = data[i].path;
										var fileName = data[i].name;
										var fileType = getExtensionType(data[i].extension);
										var assetValue = filePath.replace(serverRoot, "");
										var fileUrl = urlPrefix + assetValue;
										var size = Math.ceil(0 + data[i].size / 1024) + " kb";
										var w = 0 + data[i].width;
										var h = 0 + data[i].height;									
										
										if (fileType == 'file') {
											itemIcon.append('<span class="thumbHolder"><img border="0" src="' + $.assetmanager.baseUrl + 'icon_file.png" /></span><p class="desc"><span class="dirName">' + fileName + '</span><span class="small">' + size + '</span></p>');
												 
										} else if (fileType == 'image') {			

											var newW = w;
											var newH = h;
											var ratio = w / h;
												
											var scale = false;
											if (newW > 50) {
												newW = 50;
												newH = newW / ratio;
												scale = true;
											}
											if (newH > 50){
												newH = 50;
												newW = newH * ratio;
												scale = true;
											}
										
											itemIcon.append('<span class="thumbHolder"><img border="0" src="' + fileUrl + '" width="' + newW + '", height="' + newH + '" /></span><p class="desc"><span class="dirName">' + fileName + '</span><span class="small">(' + w + ' x ' + h + ')</span><br /><span class="small">' + size + '</span></p>');
												 
										} else if (fileType == 'audio') {
											itemIcon.append('<span class="thumbHolder"><img border="0" src="' + $.assetmanager.baseUrl + 'icon_audio.png" /></span><p class="desc"><span class="dirName">' + fileName + '</span><span class="small">' + size + '</span></p>');

										} else if (fileType == 'video') {
											itemIcon.append('<span class="thumbHolder"><img border="0" src="' + $.assetmanager.baseUrl + 'icon_video.png" /></span><p class="desc"><span class="dirName">' + fileName + '</span><span class="small">' + size + '</span></p>');
												 
										} else if (fileType == 'flash') {
											itemIcon.append('<span class="thumbHolder"><img border="0" src="' + $.assetmanager.baseUrl + 'icon_flash.png" /></span><p class="desc"><span class="dirName">' + fileName + '</span><span class="small">' + size + '</span></p>');
											
										} 
										
										itemIcon.click(function() {
																				
											// change the selected item to this one
											dialog.find(".listing ul li a").removeClass("selected");
											$(this).addClass("selected");
											
											updateDetails(fileType, w, h, assetType, assetValue, fileUrl);
											
											return false;
										});
										
										// do a virtual "click" on the selected item
										if (asset.type == assetType && asset.value == assetValue) {
											itemIcon.trigger('click');
										}
									}
									
								} kikka();  // variable scope kikka
									 
							}
						}
					});  			
				}
			}
			
			updateDialog();
			
			return false;
		});
	}

	$.fn.assetmanager = function(p1, p2, p3) {
	
		if (p1=="create") {	
			this.addClass("assetContainer");
			this.each(function(index) {
				var xml = $.xmlDOM("<xml>" + $(this).find('textarea').val() + "</xml>").contents();
				$.data(this, "assetmanager_xml", xml);
				updateIcon($(this));
			});
		}

		if (p1=="val") {
			if (p2) {
				this.each(function(index) {
					var xml = $.xmlDOM("<xml>" + p2 + "</xml>").contents();
					$.data(this, "assetmanager_xml", xml);
					updateIcon($(this));
				});
			} else {
				var xml = $.data(this.get(0), "assetmanager_xml");
				var s = getInnerXMLString(xml);		
				return s;
			}	
		}

	};

})(jQuery);
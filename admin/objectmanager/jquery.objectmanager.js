jQuery.objectmanager = {
	baseUrl: "",
	editUrls: []
};

(function($) {

	function update(div) 
	{
		var value = div.data("value");
		var text = $('<span id="text"></span>');
		if (value) {
			text.html(value + ': Loading...');
			$.ajax({
				type: "GET",
				url: $.objectmanager.baseUrl + 'ajax_adminName.php',
				data: 
				{
					class: div.data("class"),
					id: value
				},
				success: function(data) 
				{
					text.html(value + ": " + data);
				}
			});
		} else {
			text.html('0: N/A');
		}
		var changeButton = $('<a class="small-button object-button" href="#">change</a>');
		changeButton.click(function() {
			openDialog(div);
			return false;
		});
		div.find('#ui').empty().append(text).append("<span>&nbsp;</span>").append(changeButton);
		if (value) {
			var editButton = $('<a class="small-button object-button" target="_blank" href="' + $.objectmanager.editUrls[div.data("class")] + '?id=' + div.data("value") + '">edit</a>');
			div.find('#ui').append("<span>&nbsp;</span>").append(editButton);
			var clearButton = $('<a class="small-button object-button" href="#">clear</a>');
			clearButton.click(function() {
				div.data("value", 0);
				update(div);
				return false;
			});
			div.find('#ui').append("<span>&nbsp;</span>").append(clearButton);
		}
	}
	
	function openDialog(div) 
	{
	
		var value = div.data("value");
		var dialog = $('<div class="objectmanager_dialog"></div>');
		dialog.dialog(
		{
			modal: true,
			closeOnEscape: true,
			title: 'ObjectManager',
			width: 640,
			minHeight: 400,
			maxHeight: 400,
			position: {my: "center top", at: "center top+20", of: window},
			close: function()
			{
				dialog.remove();
			}
		});

		dialog.append("<div id=\"objectmanager_container\"></div>")
		dialog.find("#objectmanager_container").append("<div id=\"listContainer\"></div>");

		getList(0);
		
		function getList(page)
		{
			$.ajax({
				type: "POST",
				url: $.objectmanager.baseUrl + 'ajax_search.php',
				data: 
				{
					class: div.data("class"),
					search: dialog.find("#search").val(),
					page: page
				},
				success: function(data) 
				{
					dialog.find("#listContainer").empty();
					dialog.find("#listContainer").append(data);
		
					dialog.find("a.select").bind('click', function() 
					{
						var objectId = $(this).attr('objectId');
						div.data("value", objectId);
						update(div);
						dialog.dialog("close");
						var f = div.data("change");
						if (f) {
							f.call();
						}
					});
					
					dialog.find("a.link_pager").bind('click', function() 
					{
						var page = $(this).attr('page');
						getList(page);
						return false;
					});						
					
					dialog.find("#searchSubmit").bind('click', function() 
					{
						getList(0);							
					});
					
					dialog.find('#quickselect-web').change(function() {
						dialog.find('#search').val(dialog.find('#quickselect-web').val());
						dialog.find('#searchSubmit').trigger('click');
					});
					dialog.find('#quickselect-studio').change(function() {
						dialog.find('#search').val(dialog.find('#quickselect-studio').val());
						dialog.find('#searchSubmit').trigger('click');
					});

				}
			});					
		}
	}		
	
	$.fn.objectmanager = function(p1, p2) 
	{
		
		// "this" jQuery object possibly containing multiple elements (divs)
		// go through them and use "div" jQuery object for each		
				
		// get value
		if (p1=="val" && p2==undefined) {
			var div = this.eq(0); 
			return div.data("value");
		}
		
		this.each(function() {
			var div = $(this);
		
			if (p1=="create") 
			{	
				var html = div.html();
				var value = parseInt(html);
				if (isNaN(value)) value = 0;

				div.data("value", value);
				div.data("class", p2);
				var ui = $('<div id="ui"></div>');
				var objectmanager = $('<div class="objectmanager"></div>').append(ui);

				div.empty().append(objectmanager);
				
				update(div);
			}

			if (p1=="val")
			{
				div.data("value", p2);
				update(div);
			}

			if (p1=="change")
			{
				div.data("change", p2);
			}
			
		});
	};	

})(jQuery);
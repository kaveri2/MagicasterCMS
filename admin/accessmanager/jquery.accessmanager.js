jQuery.accessmanager = {
	baseUrl: "",
	editUrl: ""
};

(function($) {

	function setValue(div, value) 
	{
		div.find("#val").val(value);
	}

	function getValue(div) 
	{
		var value = parseInt(div.find('#val').val());
		if (isNaN(value)) value = 0;
		return value;
	}
	
	function openDialog(div) 
	{
		var value = getValue(div);
		var dialog = $('<div class="accessmanager_dialog"></div>');
		dialog.dialog(
		{
			modal: true,
			closeOnEscape: true,
			title: 'AccessManager',
			width: 640,
			minHeight: 300,
			maxHeight: 500,
			position: {my: "center top", at: "center top+20", of: window},
			close: function()
			{
				dialog.remove();
			}
		});
		
		dialog.append("<div id=\"accessmanager_container\"></div>")
		dialog.find("#accessmanager_container").append("<div id=\"formContainer\"></div>");
		dialog.find("#accessmanager_container").append("<div id=\"listContainer\"></div>");			
		
		getForm(value);
		getList(0);
					
		function getForm(id)
		{		
			$.ajax({
				type: "POST",
				url: $.accessmanager.baseUrl + 'ajax_form.php',
				data: {
					id: id
				},
				success: function(data) 
				{
					dialog.find("#formContainer").empty().append(data);
					dialog.find("#accessSave").bind('click', function() 
					{
						$.ajax({
							type: "POST",
							url: $.accessmanager.baseUrl + "ajax_form.php",
							data: {
								save: "true",
								id: id,
								adminName: dialog.find("#adminName").val()
							},
							success: function(data) 
							{
								setValue(div, data);
								update(div);
								dialog.dialog("close");							
							}
						});
					});	
					dialog.find("#accessCancel").bind('click', function() 
					{
						dialog.dialog("close");							
					});
				}
			});
		}
		
		function getList(page)
		{
			$.ajax({
				type: "POST",
				url: $.accessmanager.baseUrl + 'ajax_search.php',
				data: 
				{
					search: dialog.find("#search").val(),
					page: page
				},
				success: function(data) 
				{
					dialog.find("#listContainer").empty().append("");
					dialog.find("#listContainer").append(data);
		
					dialog.find("a.select").bind('click', function() 
					{
						var accessId = $(this).attr('accessId');
						getForm(accessId, 0, false);
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
				}
			});					
		}

	}

	function update(div) 
	{
		var value = getValue(div);
		var text = $('<span id="text"></span>');
		if (value) {
			text.html(value + ': Loading...');
			$.ajax({
				type: "GET",
				url: $.accessmanager.baseUrl + 'ajax_adminName.php',
				data: 
				{
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
		var changeButton = $('<a class="small-button access-button" href="#">change</a>');
		changeButton.click(function() {
			openDialog(div);
			return false;
		});
		div.find('#ui').empty().append(text).append("<span>&nbsp;</span>").append(changeButton);
		if (value) {
			var editButton = $('<a class="small-button access-button" target="_blank" href="' + $.accessmanager.editUrl + '?id=' + getValue(div) + '">edit</a>');
			div.find('#ui').append("<span>&nbsp;</span>").append(editButton);
			var clearButton = $('<a class="small-button access-button" href="#">clear</a>');
			clearButton.click(function() {
				setValue(div, 0);
				update(div);
				return false;
			});
			div.find('#ui').append("<span>&nbsp;</span>").append(clearButton);
		}
	}

	$.fn.accessmanager = function(p1, p2) 
	{
	
		// "this" jQuery object possibly containing multiple elements (divs)
		// go through them and use "div" jQuery object for each
		
		// get value
		if (p1=="val" && p2==undefined) {
			var div = this.eq(0); 
			var value = getValue(div);
			return value ? value : "";
		}
		
		this.each(function() {
			var div = $(this);
		
			if (p1=="create") 
			{	
				var html = div.html();
				var value = parseInt(html);
				if (isNaN(value)) value = 0;
								
				var input = $('<input id="val" type="text" style="display: none;" />');
				input.val(value);		
				var ui = $('<div id="ui" class="text"></div>');
				var accessmanager = $('<div class="accessmanager"></div>').append(input).append(ui);

				div.empty().append(accessmanager);
				
				update(div);
			}

			if (p1=="val")
			{
				setValue(div, p2);
				update(div);
			}
		});
	};
	
})(jQuery);
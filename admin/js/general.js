$(document).ready(function() {
	
	$('#menu h4').click(function(e) {
		// Remove active-class from other top-menus
		$(this).parent().siblings().children().removeClass('active');
		// Set clicked top-menu item active
		$(this).toggleClass('active');
		
		// Set current sub-menu selected 
		$(this).parent().next().children().addClass('selected');
		// Hide other visible sub-menus
		$(this).parent().siblings().children('.menu-items').not('.selected').slideUp(200);
		// Remove selected-class from the sub-menu
		$(this).parent().next().children().removeClass('selected');
		
		// Show sub-menu of the clicked item
		$(this).parent().next().children().slideToggle(200);
	});

});
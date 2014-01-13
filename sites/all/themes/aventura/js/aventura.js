jQuery(document).ready(function($) {

$(document).ready(function(){
	$('#zone-content img').jcaption();
});

$(document).ready(function(){
	$('#zone-content iframe').jcaption();
});

$(document).ready(function(){
	$('#zone-content embed').jcaption();
});

$(document).ready(function(){
	$('#zone-content object').jcaption();
});

// Responsive video fix

$('iframe').each(function(){ 
  $(this).removeAttr('width')
  $(this).removeAttr('height');
});
  
$('embed').each(function(){ 
  $(this).removeAttr('width')
  $(this).removeAttr('height');
});

$('object').each(function(){ 
  $(this).removeAttr('width')
  $(this).removeAttr('height');
});

//make side by side paragraphs equal height
function resetHeight() {
	var maxHeight = 0;
   $(".two-column-first").height("auto").each(function(){ 
       maxHeight = $(this).height(); 
   }).height(maxHeight);
	 $('.two-column-second').height(maxHeight);
}

resetHeight();
// reset height on resize of the window:
$(window).resize(function() { 
    resetHeight();
});


// Create select list navigation for mobile, small tablets

// Populate dropdown with menu items
/* Clone our navigation */

var mainNavigation = $('div.block-system-main-menu div.content').clone();

// Create the dropdown base
$("<select />").appendTo("div.block-system-main-menu div.content");

// Create default option "Go to..."
$("<option />", {
   "selected": "selected",
   "value"   : "#",
   "text"    : "Main menu"
}).appendTo("div.block-system-main-menu div.content select");
	
var selectMenu = $('div.block-system-main-menu div.content select');

 /* Navigate our nav clone for information needed to populate options */
$(mainNavigation).children('ul').children('li').each(function() {

	 /* Get top-level link and text */
	 var href = $(this).children('a').attr('href');
	 var text = $(this).children('a');
	 
	 text = text.find('span').remove().end().html();

	 /* Append this option to our "select" */
	 $(selectMenu).append('<option value="'+href+'">'+text+'</option>');

	 /* Check for "children" and navigate for more options if they exist */
	 if ($(this).children('ul').length > 0) {
			$(this).children('ul').children('li').each(function() {

				 /* Get child-level link and text */
				 var href2 = $(this).children('a').attr('href');
				 var text2 = $(this).children('a').text();

				 /* Append this option to our "select" */
				 $(selectMenu).append('<option value="'+href2+'">&nbsp;&nbsp;&nbsp;-- '+text2+'</option>');
			});
	 }
});

$("div.block-system-main-menu div.content select").change(function() {
  window.location = $(this).find("option:selected").val();
});


});
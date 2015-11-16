$(document).ready(function(){

	// $(".menu").find("a").on("click", function(e){
    //
	// 	$(this).toggleClass('selected');
	// 	$(this).next().toggle();
    //
	// 	e.preventDefault(); // prevent default click operation
	// });

	// This works if elements are added later
	$(".menu").on("click", "a", function(e){
		$(this).toggleClass('selected');
		$(this).next().toggle();
		e.preventDefault();
	});

	// $(".menu").children("li").hover(function(){
	// 	$(this).animate({ marginLeft: 18, marginRight: 0});
	// }, function(){
	// 	$(this).animate({ marginLeft: 0, marginRight: 18});
	// });

	// This one has a smoother effect.
	$(".menu").children("li").hover(function(){
		$(this).stop(true, true).delay(100).animate({ marginLeft: 18, marginRight: 0});
	}, function(){
		$(this).stop(true, true).delay(100).animate({ marginLeft: 0, marginRight: 18});
	});

	$("button").on("click", function(){
		var item = $('<li><a href="" class="menu">Menu</a> <ul style="display:none;"><li>Item 1</li><li>Item 2</li></ul></li>');
		$("ul.menu").append(item);
	});

	// These are part of jQuery UI. Need to include the plugins in your HTML header.
	$( "#sortable-menu" ).sortable();
    $( "#sortable-menu" ).disableSelection();
});

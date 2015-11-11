$(document).ready(function(){

	$(".menu").find("a").on("click", function(){
		$(this).toggleClass('selected');
		$(this).next().toggle();
	});

	// This works if elements are added later
	// $(".menu").on("click", "a", function(){
	// 	$(this).toggleClass('purple');
	// 	$(this).next().toggle();
	// });
    //
	$(".menu").children("li").hover(function(){
		$(this).animate({ marginLeft: 18, marginRight: 0});
	}, function(){
		$(this).animate({ marginLeft: 0, marginRight: 18});
	});

	// This one has a smoother effect.
	// $(".menu").children("li").hover(function(){
	// 	$(this).stop(true, true).delay(100).animate({ marginLeft: 18, marginRight: 0});
	// }, function(){
	// 	$(this).stop(true, true).delay(100).animate({ marginLeft: 0, marginRight: 18});
	// });

	$("button").on("click", function(){
		var item = $('<li><a href="" class="menu">Menu</a> <ul style="display:none;"><li>Item 1</li><li>Item 2</li></ul></li>');
		$("ul.menu").append(item);
	});

});

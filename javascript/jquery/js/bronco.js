$(document).ready(function()
{
	/* Define menu click toggle handlers */
	$("#meatlover_button").click(function()
	{
		$("#meatlover_items").toggle("slow");
	});

	$("#healthlover_button").click(function()
	{
		$("#healthlover_items").toggle("fast");
	});

	$("#drink_button").click(function()
	{
		$("#drink_items").toggle(2000);
	});

	/** Define item hover animation handlers (for left and right actions) */
	$("ol").hover(
		function()
		{
			$(this).animate({ marginLeft:38, marginRight: 0 });

		},
		function()
		{
			$(this).animate({ marginLeft:18, marginRight: 18 });
		}
	);
});

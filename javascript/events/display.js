/**
 * This is the JavaScript companion to "display_options_event-driven.html",
 * which contains the functions for the event handlers.
 */

/*
 * Function: Display Option 1
 * Description: (Example Option #1) Uses the window.alert() method to display data in a pop-up alert box.
 */
function displayWindowAlert()
{
	var x = 5;
	var y = 10;
	window.alert("Option 1: The sum of " + x + " and " + y + " is: " + (x + y));
}

/**
 * Function: Display Option 2
 * Description: (Example Option #2) Uses the document.getElementById(id) method to access an HTML element.
 */
function displayDocumentGetElementById()
{
	var x = 5;
	var y = 10;
	/** The innerHTML property defines the corresponding HTML content */
	document.getElementById("example2").innerHTML = "Option 2: The sum of " + x + " and " + y + " is: " + (x + y);
}

/**
 * Function: Display Option 3
 * Description: (Example Option #3) Uses the document.write() method, which is often convenient for testing and debugging purposes.
 * Warning: This deletes the rest of the existing HTML!
 */
function displayDocumentWrite()
{
	var x = 5;
	var y = 10;
	document.write("Option 3: The sum of " + x + " and " + y + " is: " + (x + y));
}

/**
 * Function: Display Option 4
 * Description: (Example Option #4) Uses the console.log() method, where the data can be viewed in the browser console.
 */
function displayConsoleLog()
{
	var x = 5;
	var y = 10;
	console.log("Option 4: The sum of " + x + " and " + y + " is: " + (x + y));
}

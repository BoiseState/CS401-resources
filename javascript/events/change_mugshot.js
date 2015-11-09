//**************************************************************
// This is the JavaScript companion to "change_mugshot.html",
// which contains the function for the event handler.
//**************************************************************

/**
 * update initial time stamp and add action listeners.
 */
window.onload = function(e) {

	// Makes sure that the timestamp is updated when the page is initially loaded.
	update_timestamp(e);

	// Add event listener handler (change_mugshot function) to mugshot button.
	document.getElementById("updateButton").onclick = change_mugshot;
}

/**
 * Function: Change Mugshot
 * Description: Uses the document.getElementById() method to access the attribute contents
 * of the image node with the "mugshot" identifier.
 */
function change_mugshot()
{
	var mugshot = document.getElementById("mugshot");

	/* Switch between the two mugshots, depending on the value of "mugshot.alt".
	 * Note: we could use the path of mugshot.src, but it uses the absolute path
	 * (instead of the relative path) so it could change depending on the system
	 */
	if(mugshot.alt === "Your current mugshot: Yeti")
	{
		mugshot.src = "images/puppy.jpg";
		mugshot.alt = "Your current mugshot: Puppy";
	}
	else
	{
		mugshot.src = "images/yeti.jpg";
		mugshot.alt = "Your current mugshot: Yeti";
	}

	/* Update the timestamp of the mugshot */
	update_timestamp();
}

/**
 * Function: Update Timestamp
 * Description: Updates the timestamp of the "timestamp" span with the current time.
 */
function update_timestamp()
{
	var timestamp = document.getElementById("timestamp");
	timestamp.innerHTML = get_timestamp();
}

/** Function: Get Time Stamp
 *  Description: Uses a Date object to access the current timestamp and then format it.
 */
function get_timestamp()
{
	var currentTime = new Date();
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	var seconds = currentTime.getSeconds();

	/** Format the seconds and minutes with 2 digits */
	if (minutes < 10) { minutes = "0" + minutes; }
	if (seconds < 10) { seconds = "0" + seconds; }

	var timestamp = hours + ":" + minutes + ":" + seconds + " ";

	if(hours > 11) {
		timestamp += "PM";
	} else {
		timestamp += "AM";
	}
	return timestamp;
}

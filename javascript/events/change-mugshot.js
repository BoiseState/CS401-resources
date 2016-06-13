//**************************************************************
// This is the JavaScript companion to "change_mugshot.html",
// which contains the function for the event handler.
//**************************************************************

/**
 * update initial time stamp and add action listeners.
 */
window.onload = function(e) {

	// Makes sure that the timestamp is updated when the page is initially loaded.
	updateTimestamp(e);

	// Add event listener handler (change_mugshot function) to mugshot button.
	document.getElementById("updateButton").onclick = changeMugshot;
}

/**
 * Function: Change Mugshot
 * Description: Uses the document.getElementById() method to access the attribute contents
 * of the image node with the "mugshot" identifier.
 */
function changeMugshot() {
	var mugshot = document.getElementById("mugshot");
	var yeti = { alt: "yeti", src: "images/yeti.jpg"};
	var puppy = { alt: "puppy", src: "images/puppy.jpg"};

	/* Switch between the two mugshots, depending on the value of "mugshot.alt".
	 * Note: we could use the path of mugshot.src, but it uses the absolute path
	 * (instead of the relative path) so it could change depending on the system
	 */
	var img = (mugshot.alt === yeti.alt) ? puppy: yeti;
	mugshot.setAttribute("src", img.src);
	mugshot.setAttribute("alt", img.alt);

	/* Update the timestamp of the mugshot */
	updateTimestamp();
}

/**
 * Function: Update Timestamp
 * Description: Updates the timestamp of the "timestamp" span with the current time.
 */
function updateTimestamp() {
	var timestamp = document.getElementById("timestamp");
	timestamp.innerHTML = getTimestamp();
}

/** Function: Get Time Stamp
 *  Description: Uses a Date object to access the current timestamp and then format it.
 */
function getTimestamp() {
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

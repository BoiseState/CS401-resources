// This JavaScript file contains simple event handlers that correspond
// to the mouseover and click events in the "solar_system.html" companion
// file.

/**
 * add action listener to button.
 */
window.onload = function(e) {
	addListeners("sun");
	addListeners("mercury");
	addListeners("venus");
	addListeners("earth");
	addListeners("moon");
	addListeners("mars");
	addListeners("jupiter");
	addListeners("saturn");
	addListeners("uranus");
	addListeners("neptune");
}

function addListeners(id) {
	var element = document.getElementById(id);
	element.onclick = updateSingleClick;
	element.ondblclick = updateDoubleClick;
	element.onmouseover = updateMouseover;
	element.onmouseout = updateMouseover;
}

/*
 * Function: Update Mouseover
 * Description: "Listens" for mouseover events and then changes the corresponding
 * "current massive object mouseover" value in the companion HTML file.
*/
function updateMouseover() {
	var element = document.getElementById("current-object-mouseover");
	var name = this.getAttribute('data-name');
    element.innerHTML = name;
}

/*
 * Function: Update (Mouse) Single-Click
 * Description: "Listens" for single-click events and then changes the corresponding
 * "most recent massive object single-click" value in the companion HTML file.
*/
function updateSingleClick() {
    var element = document.getElementById("recent-object-singleclick");
	var name = this.getAttribute('data-name');
    element.innerHTML = name;
}

/*
 * Function: Update (Mouse) Double-Click
 * Description: "Listens" for double-click events and then changes the corresponding
 * "most recent massive object double-click" value in the companion HTML file.
*/
function updateDoubleClick() {
    var element = document.getElementById("recent-object-doubleclick");
	var name = this.getAttribute('data-name');
    element.innerHTML = name;
}

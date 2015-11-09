
// This JavaScript file contains simple event handlers that correspond
// to the mouseover and click events in the "solar_system.html" companion
// file.

/*
 * Function: Update Mouseover
 * Description: "Listens" for mouseover events and then changes the corresponding
 * "current massive object mouseover" value in the companion HTML file.
*/
function update_mouseover(object_name) 
{
	
	document.getElementById("current_object_mouseover").innerHTML = object_name;
    document.getElementById("object_name").innerHTML = object_name;
}

/*
 * Function: Update (Mouse) Single-Click
 * Description: "Listens" for single-click events and then changes the corresponding
 * "most recent massive object single-click" value in the companion HTML file.
*/
function update_singleclick(object_name) 
{
    document.getElementById("recent_object_singleclick").innerHTML = object_name;
}

/*
 * Function: Update (Mouse) Double-Click
 * Description: "Listens" for double-click events and then changes the corresponding
 * "most recent massive object double-click" value in the companion HTML file.
*/
function update_doubleclick(object_name) 
{
    document.getElementById("recent_object_doubleclick").innerHTML = object_name;
}
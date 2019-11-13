$(document).ready(function() {

  /* Use jQuery UI to make the title and matrix draggable. (See https://api.jqueryui.com/draggable/) */ 
  $("#title").draggable();
  $("#matrix").draggable( {
    axis: "x" // only allow movement in x-axis.
  });

  /* Use jQuery UI to make the list sortable. (See https://api.jqueryui.com/sortable/) */ 
  $("#matrix-list").sortable();

  /* 
   * Selects and adds a 'mouseenter' event handler to all <td> elements on the page.
   */
  $('td').mouseenter(function() {
    updateMatrixLocationText("You entered the matrix at " + $(this).text() + "!");
  });

  /* 
   * Selects and adds a 'mouseleave' event handler to all <td> elements on the page.
   */
  $('td').mouseleave(function() {
    updateMatrixLocationText("You have left the matrix."); 
  });

  /* 
   * Selects and adds a 'hover' event handler to all <td> elements on the page.
   */
  $("td").hover(function(){
    $(this).toggleClass("redpill");
    $(this).hide("slow", function() {
      $(this).show("slow");
    });
  });

  /**
   * Updates the matrix table caption with the given text.
   * @param (String) text The text to place in the caption.
   */
  function updateMatrixLocationText(text) {
    $("#matrix > caption").text(text); 
  }
});



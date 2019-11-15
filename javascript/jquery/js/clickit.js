 $(document).ready(function() {

  // Adds the click event listener to all existing buttons on the page
  // $('button').click(addText);
  // $('button').click(addButton);

  // Adds the click event listener to all buttons added to the page at any time.
  $(document).on('click', 'button', addText);
  $(document).on('click', 'button', addButton);

  /**
   * Reads the value from the input field. Creates a paragraph
   * element with the text and appends it to the main element.
   */
  function addText(e) {
    // Use jQuery to get the text from thet input field.
    let input = $('input').val();

    // Use jQuery to create a new paragraph with the text set to input value.
    let outputParagraph = $('<p></p>').text(input);

    // Use jQuery selectors to append the paragraph to the parent element 
    //    of the button that was clicked.
    $(this).parent().parent().append(outputParagraph);

    // 4. Prevent the browser from submitting the form to the server.
    e.preventDefault();
  }

   function addButton(e) {
     // Create the button we want to add
     let newButton = $('<button></button>').text('No click me');
     $(this).parent().append(newButton);
     e.preventDefault();
   }
});

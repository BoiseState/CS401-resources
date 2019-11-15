// Retrieve the "Click Me" button
// querySelector only retrieves first element.
const buttonElement = document.querySelectorAll('button');
const inputField = document.querySelector('input');

// Add the click event listener to the button

buttonElement.addEventListener('click', addText);

/**
 * Reads the value from the input field. Creates a paragraph
 * element with the text and appends it to the main element.
 */
function addText(e) {
  // 1. Get the text from thet input field.
  let text = inputField.value;
  console.log(text);

  // 2. Create a paragagraph containing the text.
  let p = document.createElement('p');
  p.textContent = text;
  console.log(p);

  // 3. Add the paragraph to the page.
  this.parentNode.appendChild(p);

  // 4. Update the text on this button to "clicked".
  // 'this' refers to the button (or object) that generated this event.
  this.textContent = "clicked";
  
  // Prevent the browser from submitting the form to the server.
  e.preventDefault();
}

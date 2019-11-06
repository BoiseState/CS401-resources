/**
 * This is the JavaScript companion to "the_amazing_calculator.html",
 * which contains the function for the event handler.
 */

// Store references to input and output fields.
const xField = document.getElementById("var_x");
const yField = document.getElementById("var_y");
const opSelector = document.getElementById("operation");
const answer = document.getElementById("answer");

// Retrieve and add action listener to compute button.
const computeButton = document.querySelector("#computeButton");

computeButton.addEventListener('click', compute);

/**
 * Function: Compute
 * Description: Applies the binary operation to the two number variables to obtain the result.
 */
function compute()
{
  console.log('Computing...');

  // Retrieve values from input fields.
  let x = Number(xField.value);
  let y = Number(yField.value);
  let result;

  // Compute result based on selected operator.
  switch(opSelector.value)
  {
    case "add":
      result = x + y;
      break;
    case "sub":
      result = x - y;
      break;
    case "mul":
      result = x * y;
      break;
    case "div":
      result = x / y;
      break;
    case "mod":
      result = x % y;
      break;
    case "exp":
      result = x ** y;
      break;
    default:
      result = 'Invalid operator';
      break;
  }

  console.log('Executed the ' + opSelector.value + ' operation on ' 
              + x + ' and ' + y + ' to obtain ' + result);

  // Update answer span with result.
  answer.textContent = result;

  // Prevent default form submission behavior.
  event.preventDefault();
}

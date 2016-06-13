/**
 * This is the JavaScript companion to "the_amazing_calculator.html",
 * which contains the function for the event handler.
 */

/**
 * add action listener to button.
 */
window.onload = function(e) {
	document.getElementById("computeButton").onclick = compute;
}

/**
 * Function: Compute
 * Description: Applies the binary operation to the two number variables to obtain the result.
 */
function compute() {
	var x = document.getElementById("var_x");
	var y = document.getElementById("var_y");
	var operation = document.getElementById("operation");
	var answer = document.getElementById("answer");
	var result;

	switch(operation.value)
	{
		case "add":
			result = Number(x.value) + Number(y.value);
			console.log("Executed addition operation on ");
			break;
		case "sub":
			result = Number(x.value) - Number(y.value);
			console.log("Executed subtraction operation on ");
			break;
		case "mul":
			result = Number(x.value) * Number(y.value);
			console.log("Executed multiplication operation on ");
			break;
		case "div":
			result = Number(x.value) / Number(y.value);
			console.log("Executed division operation on ");
			break;
		case "mod":
			result = Number(x.value) % Number(y.value);
			console.log("Executed modulus operation on ");
			break;
		case "exp":
			result = Math.pow(Number(x.value), Number(y.value));
			console.log("Executed exponentiation operation on ");
			break;
	}
	console.log(x.value + " and " + y.value + " to obtain " + result);

	answer.innerHTML = result;
}

// Store reference to progress bar element.
const bar = document.querySelector("progress");

window.addEventListener('scroll', function() {
  // Determine max Y value of the current page.
	let max = document.body.scrollHeight - innerHeight;

  // Calculate how far down the page we are.
	let percent = (pageYOffset / max) * 100;

  // Set progress bar's current value to percentage.
	bar.value = percent;
});

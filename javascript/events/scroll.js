/* 
 * Store reference to progress bar element so we don't have to retrieve it every
 * time a scroll event occurs.
 */
const bar = document.querySelector("progress");

/*
 * When the document receives scroll event, update the progress bar with the percentage
 * of the way down the page we are.
 */
document.addEventListener('scroll', function() {
  /* 
   * Determine maximum scroll height of the current page (aka. how many pixels
   * can we actually scroll).
   *   scrollHeight - property of DOM (height of element including padding)
   *   innerHeight - property of window (height of browser window viewport)
   */
	let maxScrollHeight = document.body.scrollHeight - window.innerHeight;

  /*
   * Calculate how far down the page we are.
   *   pageYOffset - property of window (how many pixels the document is currently scrolled) 
   */
	let percent = (window.pageYOffset / maxScrollHeight) * 100;

  // Set progress bar's current value to percentage.
	bar.value = percent;
});

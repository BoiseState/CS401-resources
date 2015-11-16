
/**
 * This is the JavaScript companion to "sayMagicWord.html",
 * which contains the functions for the event handlers.
 */

/**
 * Function: Text Magic Word
 * Description: Uses the window.alert() method to display a word with text in a pop-up alert box.
 */
function textMagicWord() {
	window.alert("PLEASE!");
}

/**
 * Function: Speak Magic Word
 * Description: Uses a speech synthesis object to verbally speak a word.
 */
function speakMagicWordSpeak() {
	/** Initialize and configure speech synthesis object */
	var msg = new SpeechSynthesisUtterance();
	var voices = window.speechSynthesis.getVoices();
	msg.voice = voices[10]; // Note: some voices don't support altering params
	msg.voiceURI = 'native';
	msg.volume = 1; // 0 to 1
	msg.rate = 1; // 0.1 to 10
	msg.pitch = 2; //0 to 2
	msg.text = 'PLEASE!';
	msg.lang = 'en-US';

	speechSynthesis.speak(msg);
}

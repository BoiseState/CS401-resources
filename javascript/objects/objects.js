window.onload = function() {
	var elName = document.getElementById('userName');
	elName.textContent = currentUser.name;

	var speakBtn = document.getElementById('speak');
	speakBtn.onclick = speak;

	var whisperBtn = document.getElementById('whisper');
	whisperBtn.onclick = whisper;
}

var user1 = new User('Snoopy', 7, 'Woof Woof!');
var user2 = new User('Daffy', 18, 'Quack Quack!');

var users = [ user1, user2 ];

var currentUser = users[Math.floor(Math.random() * users.length)];

function speak() {
	currentUser.sayHello();
}

function whisper() {
	currentUser.debug();
}

function User(name, age, quote) {
	this.name = name;
	this.age = age;
	this.quote = quote;
	/* all instances have their own copy of the function */
	this.debug = function() {
		console.log(this);
	}
}

/* all instances share the same copy of the function */
User.prototype.sayHello = function() {
	alert(this.name + ' says ' + this.quote);
}

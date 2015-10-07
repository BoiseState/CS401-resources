USE marissa;

# Drop tables first.
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS users;

# Recreate them.

// create a table in database
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(100) NOT NULL,
	password VARCHAR (50) NOT NULL,
	name VARCHAR(100) NOT NULL,
	species VARCHAR (100) NOT NULL DEFAULT 'human',
	gender CHAR(1) NOT NULL,
	age INT NOT NULL,
	UNIQUE(email)
);

INSERT INTO users (email, password, name, species, gender, age)
	VALUES ('snoopy@example.com', 'snoopypass', 'Snoopy', 'dog', 'M', 7 );
INSERT INTO users (email, password, name, species, age)
	VALUES ('natalia@example.com', 'nataliapass', 'Natalia Romanova', 'human', 'F', 30);
INSERT INTO users (email, password, name, species, age)
	VALUES ('mulan@example.com', 'huapass', 'Hua Mulan', 'human', 'F', 18);
INSERT INTO users (email, password, name, species, age)
	VALUES ('fred@example.com', 'fredpass', 'Fred Flintstone', 'human', 'M', 40);
INSERT INTO users (email, password, name, species, age)
	VALUES ('bugs@example.com', 'bugspass', 'Bugs Bunny', 'rabbit', 'M', 6);
INSERT INTO users (email, password, name, species, age)
	VALUES ('brucebanner@example.com', 'brucepass', 'Bruce D. Banner', 'human', 'M', 47);
INSERT INTO users (email, password, name, species, age)
	VALUES ('charliebrown@example.com', 'charliepass', 'Charlie Brown', 'human', 'M', 8);
INSERT INTO users (email, password, name, species, age)
	VALUES ('princesspocahontas@example.com', 'pocahontaspass', 'Pocahontas', 'human', 'F', 23);
INSERT INTO users (email, password, name, species, age)
	VALUES ('brucewayne@example.com', 'brucepass', 'Bruce Wayne', 'bat', 'M', 38);

# create a second table with posts
CREATE TABLE posts (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	message VARCHAR (255) NOT NULL,
	posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

# use insert to populate the posts table (faster to do this from a file or copy/paste!!!)
INSERT INTO posts (user_id, message, posted) VALUES (7, 'That''s the secret to life... replace one worry with another...', '2015-04-13');
INSERT INTO posts (user_id, message, posted) VALUES (8, 'Good grief Charlie Brown!', 20150414);
INSERT INTO posts (user_id, message, posted) VALUES (1, 'woof! woof!', 20150415);
INSERT INTO posts (user_id, message, posted) VALUES (9, 'Sometimes it''s only madness that makes us what we are!!', 20150421);
INSERT INTO posts (user_id, message, posted) VALUES (5, 'whats up doc?', 20150416);
INSERT INTO posts (user_id, message, posted) VALUES (6, 'Hulk Smash!!', 20150420);
INSERT INTO posts (user_id, message, posted) VALUES (2, 'Don''t let the door hit you in the back on the way out.', 20150417);
INSERT INTO posts (user_id, message, posted) VALUES (3, 'Ha! I see you have a sword! I have one too!', 20150418);
INSERT INTO posts (user_id, message, posted) VALUES (4, 'Yabba Dabba Doo!!', 20150418);
INSERT INTO posts (user_id, message, posted) VALUES (6, 'I don''t think we should be focusing on Loki. That guy''s brain is a bag full of cats. You can smell crazy on him.', 20150419);
INSERT INTO posts (user_id, message, posted) VALUES (9, 'Its me, Batman!', 20150423);
INSERT INTO posts (user_id, message, posted) VALUES (2, 'Who is that?', 20150422);
INSERT INTO posts (user_id, message, posted) VALUES (1, 'woof! woof! woof!', 20150417);

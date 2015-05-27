USE marissa;

# Drop tables first.
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS users;

# Recreate them.
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR (50) NOT NULL,
	password VARCHAR (50) NOT NULL,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	gender VARCHAR (1) NOT NULL,
	species VARCHAR (100) NOT NULL DEFAULT 'human',
	age INT NOT NULL,
	UNIQUE(username)
);
# use insert to populate the users table (faster to do this from a file or copy/paste!!!)
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('snoopy', 'snoopypass', 'Snoopy', 'snoopy@example.com', 'M', 'dog', 7 );
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('nataliaromanova', 'nataliapass', 'Natalia Romanova', 'natalia@example.com', 'F', 'human', 30);
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('huamulan', 'huapass', 'Hua Mulan', 'hua@example.com', 'F', 'human', 18);
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('fredflintstone', 'fredpass', 'Fred Flintstone', 'fred@example.com', 'M', 'human', 40);
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('bugsbunny', 'bugspass', 'Bugs Bunny', 'bugs@example.com', 'M', 'rabbit', 6);
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('brucebanner', 'brucepass', 'Bruce D. Banner', 'bruce@example.com', 'M', 'human', 47);
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('charliebrown', 'charliepass', 'Charlie Brown', 'charlie@example.com', 'M', 'human', 8);
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('princesspocahontas', 'pocahontaspass', 'Pocahontas', 'princesspocahontas@example.com', 'F', 'human', 23);
INSERT INTO users (username, password, name, email, gender, species, age)
	VALUES ('brucewayne', 'brucepass', 'Bruce Wayne', 'brucewayne@example.com', 'M', 'bat', 38);


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

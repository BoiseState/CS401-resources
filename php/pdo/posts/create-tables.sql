-- To run this script, use the following command at the mysql prompt 
-- source create-tables.sql;

-- Drop tables first.
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS users;

-- Then recreate them.
-- create a table in database
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR (50) NOT NULL UNIQUE,
	password VARCHAR (255) NOT NULL,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	species VARCHAR (100) NOT NULL DEFAULT 'human',
	gender CHAR(1) NOT NULL,
	age INT NOT NULL
);

-- use insert to populate the users table (faster to do this from a file or copy/paste!!!)
INSERT INTO users  (username, password, first_name, last_name, email, species, gender, age)
	VALUES( 'gummybear', 'gummypass', 'Gummy', 'Bear', 'gummybear@example.com', 'bear', 'F', 1);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('snoopy', 'snoopypass', 'Snoopy', 'Brown', 'snoopy@example.com', 'dog', 'M', 7 );
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('blackwidow', 'nataliapass', 'Natalia', 'Romanova', 'natalia@example.com', 'human', 'F', 30);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('mulan', 'huapass', 'Mulan', 'Hua', 'mulan@example.com', 'human', 'F', 18);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('fredflintstone', 'fredpass', 'Fred', 'Flintstone', 'fred@example.com', 'human', 'M', 40);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('bugsbunny', 'bugspass', 'Bugs', 'Bunny', 'bugs@example.com', 'rabbit', 'M', 6);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('thehulk', 'brucepass', 'Bruce', 'Banner', 'brucebanner@example.com', 'human', 'M', 47);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('charliebrown', 'charliepass', 'Charlie', 'Brown','charliebrown@example.com', 'human', 'M', 8);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('princesspocahontas', 'pocahontaspass', 'Pocahontas', 'Rolfe', 'princesspocahontas@example.com', 'human', 'F', 23);
INSERT INTO users (username, password, first_name, last_name, email, species, gender, age)
	VALUES ('batman', 'brucepass', 'Bruce', 'Wayne', 'brucewayne@example.com', 'bat', 'M', 38);


-- create a second table with posts
CREATE TABLE posts (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	message TEXT NOT NULL,
	posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id)
);
-- use insert to populate the posts table (faster to do this from a file or copy/paste!!!)
INSERT INTO posts (user_id, message, posted) VALUES(
	(SELECT id FROM users WHERE username = 'charliebrown'), 'That''s the secret to life... replace one worry with another...', '2015-09-13 12:30:10');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username = 'princesspocahontas'), 'Good grief Charlie Brown!', '2015-09-14 8:32:10');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='bugsbunny'), 'whats up doc?', '2015-09-15 18:18:03');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='snoopy'), 'woof! woof! woof!', '2015-09-15 22:55:21');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='blackwidow'), 'Don''t let the door hit you in the back on the way out.', '2015-09-17 22:55:21');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='mulan'), 'Ha! I see you have a sword! I have one too!', '2015-09-18 06:05:18');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='snoopy'), 'woof! woof!', '2015-09-14 11:18:03');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='blackwidow'), 'Who is that?', '2015-09-23 01:04:51');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='fredflintstone'), 'Yabba Dabba Doo!!', '2015-09-18 09:16:18');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='thehulk'), 'Hulk Smash!!', '2015-09-22 11:58:51');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='thehulk'), 'I don''t think we should be focusing on Loki. That guy''s brain is a bag full of cats. You can smell crazy on him.', '2015-09-22 11:58:31');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE username='batman'), 'Sometimes it''s only madness that makes us what we are!!',  '2015-09-22 12:00:02');
INSERT INTO posts (user_id, message) VALUES (
	(SELECT id FROM users WHERE username='batman'), 'Its me, Batman!');
INSERT INTO posts (user_id, message) VALUES (
	(SELECT id FROM users WHERE username='gummybear'), 'I am a gummy bear! Oh, I''m a Yummy, Chummy, Funny, Lucky Gummy Bear.');

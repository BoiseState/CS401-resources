-- login to mysql before running these commands.
mysql -u csstudent -p webdev 

-- see existing databases for your username
SHOW DATABASES;

-- user your database from this point on.
USE webdev;

-- display all tables in database (probably empty)
SHOW TABLES;

-- create a table in database
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR (50) NOT NULL UNIQUE,
	password VARCHAR (50) NOT NULL,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	species VARCHAR (100) NOT NULL DEFAULT 'human',
	gender CHAR(1) NOT NULL,
	age INT NOT NULL
);

-- display all tables in database (should be just one) and
SHOW TABLES;

-- describe the new blank table to show the columns
DESCRIBE users;

-- show that the new blank table is empty
SELECT * FROM users;

-- Can show warnings with \W

-- use insert to insert a row with specific id.
INSERT INTO users VALUES(1, 'gummybear', 'gummypass', 'Gummy', 'Bear', 'gummybear@example.com', 'bear', 'F', 1);

-- use the select statements to show table contents
SELECT * FROM users;

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


-- use the select statement to show table contents
SELECT * FROM users;

-- show a single column in the table
SELECT username FROM users;

-- show multiple columns in the table
SELECT first_name, last_name, gender, species FROM users;



-- filter with the WHERE clause with one condition
SELECT * FROM users WHERE gender = 'F';

-- filter with one condition to show equal
SELECT * FROM users WHERE age = 6;

-- filter with one condition of less than or equal to
SELECT * FROM users WHERE age <= 33;

-- filter with one condition for a specific age range (with a min and max)
SELECT * FROM users WHERE age between 7 AND 33;

-- filter with multiple conditions for a specific age range and gender
SELECT * FROM users WHERE age between 7 AND 33 AND gender = 'F';




-- in most cases in MariaDB, the simple pattern matching provided by LIKE is sufficient. like has two types of matches:
-- 1) _ the underscore, matching a single character
-- 2) % the percentage sign, matching any number of characters

-- we can use a single underscore
SELECT id, username, first_name FROM users WHERE first_name LIKE 'B__s';

-- we can use a multile underscores
SELECT id, username, first_name FROM users WHERE first_name LIKE 'B____';

-- filter with like operator to filter strings. the '%' is a wildcard placeholder for pattern specifications
-- filter text that starts with a given prefix
SELECT id, username, first_name FROM users WHERE first_name LIKE 'B%';

-- filter text that contains a given substring
SELECT id, username, first_name FROM users WHERE first_name LIKE '%u%';

-- filter text that contains a given substring with age condition
SELECT id, username, first_name FROM users WHERE first_name LIKE '%u%' AND age < 30;


-- in more complicated cases, we can use regular expressions for complex pattern matching.
-- REGEXP is not case sensitive (except when used with binary strings).
-- match the beginning of a string
SELECT id, username, first_name FROM users WHERE first_name REGEXP '^Br';

-- match the end of a string
SELECT id, username, first_name FROM users WHERE first_name REGEXP 'r$';

-- match any character (including carriage return and newline)
SELECT id, username, first_name FROM users WHERE first_name REGEXP 'B.';

-- n* matches zero or more of a character n
SELECT id, username, first_name FROM users WHERE last_name REGEXP 'Bannn*er';

-- n+ matches one or more of a character n
SELECT id, username, last_name FROM users WHERE last_name REGEXP 'Bannn+er'; -- will NOT return anything
SELECT id, username, last_name FROM users WHERE last_name REGEXP 'Bann+er'; -- will return one thing

-- A match can be performed against more than one word with the | character
SELECT id, username, last_name FROM users WHERE last_name REGEXP 'Wayne|Banner';



-- order/sort results (in ascending order)
SELECT * FROM users ORDER BY username;

-- order/sort results in descending order
SELECT * FROM users ORDER BY username DESC;

-- order/sort results by multiple columns, first by name ascending, and second by age descending
SELECT * FROM users ORDER BY species, age DESC;
SELECT * FROM users ORDER BY species DESC, age DESC;


-- place a limit on the ordered/sorted results
SELECT * FROM users ORDER BY username, species DESC LIMIT 3;




-- aggregate data by computing the average age
SELECT AVG(age) FROM users;

-- aggregate data by computing the average age for females
SELECT AVG(age) FROM users WHERE gender = 'F';

-- aggregate data by computing the average age for males
SELECT AVG(age) FROM users WHERE gender = 'M';

-- aggregate data by computing the average age for females and males by group
SELECT gender, AVG(age) FROM users GROUP BY gender;

-- aggregate data to count the number of users with age greater than 30
SELECT COUNT(*) FROM users WHERE age > 30;



-- before using UPDATE and DELETE to modify data .... first show the result we will update
SELECT * FROM users WHERE username = 'princesspocahontas';

-- use UPDATE to modify data (single column entry) of a row.... Pocahontas wants a shorter and username and password!
UPDATE users SET password = 'pocapass', username = 'pocahontas' WHERE username = 'princesspocahontas';

-- show all results after update
SELECT * FROM users;

-- use UPDATE to modify data (multiple column entries) of a row .... Snoopy wants to be cool and change his name and email!
UPDATE users SET first_name = 'Joe', last_name='Cool', username = 'joecool' WHERE username = 'snoopy';

-- show all results after update and before delete
SELECT * FROM users;

-- use delete to delete all rows with this condition (in this case just one row)
DELETE FROM users WHERE username = 'fredflintstone';

-- show all results after delete
SELECT * FROM users;

-- Be careful!!
DELETE FROM users;

-- Get rid of table and start over
DROP TABLE users;

-- create a second table with posts
CREATE TABLE posts (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	message VARCHAR (255) NOT NULL,
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



-- use join to link the two tables by columns that have the same id.
-- here, we will join the users with their posts, by linking them via the id
SELECT * FROM users JOIN posts ON users.id = posts.user_id;

-- just display the name, time, and message
SELECT username, posted, message FROM users JOIN posts ON users.id = posts.user_id;

-- now sort it by date
SELECT username, posted, message FROM users JOIN posts ON users.id = posts.user_id ORDER BY posted;

-- here, we will join with a where clause with a single condition
-- show date ordered posts after a certain date
SELECT username, posted, message FROM users JOIN posts ON users.id = posts.user_id WHERE posted > 20150917 ORDER BY posted;

-- here, we will join with a where clause with multiple conditions
-- show date ordered posts after a certain date from two users
SELECT username, posted, message FROM users JOIN posts ON users.id = posts.user_id WHERE posted > 20150417 AND username = 'batman' OR username = 'blackwidow' ORDER BY posted;

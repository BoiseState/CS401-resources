// see existing databases for your username
SHOW DATABASES;

// user your database from this point on.
USE marissa;

// display all tables in database (probably empty)
SHOW TABLES;



// create a table in database
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



// display all tables in database (should be just one) and
SHOW TABLES;

// describe the new blank table to show the columns
DESCRIBE users;

// show that the new blank table is empty
SELECT * FROM users;

// Can show warnings with \W

// use insert to populate the users table (faster to do this from a file or copy/paste!!!)
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



// use the select statement to show table contents
SELECT * FROM users;

// show a single column in the table
SELECT name FROM users;

// show multiple columns in the table
SELECT name, gender, species FROM users;



// filter with the WHERE clause with one condition
SELECT * FROM users WHERE gender = 'F';

// filter with one condition to show equal
SELECT * FROM users WHERE age = 6;

// filter with one condition of less than or equal to
SELECT * FROM users WHERE age <= 33;

// filter with one condition for a specific age range (with a min and max)
SELECT * FROM users WHERE age between 7 AND 33;

// filter with multiple conditions for a specific age range and gender
SELECT * FROM users WHERE age between 7 AND 33 AND gender = 'F';




// in most cases in MariaDB, the simple pattern matching provided by LIKE is sufficient. like has two types of matches:
// 1) _ the underscore, matching a single character
// 2) % the percentage sign, matching any number of characters

// we can use a single underscore
SELECT id, name FROM users WHERE name LIKE 'Bugs Bunn_';

// we can use a multile underscores
SELECT id, name FROM users WHERE name LIKE 'Bu__ Bunn_';

// filter with like operator to filter strings. the '%' is a wildcard placeholder for pattern specifications
// filter text that starts with a given prefix
SELECT id, name FROM users WHERE name LIKE 'B%';

// filter text that contains a given substring
SELECT id, name FROM users WHERE name LIKE '%B%';

// filter text that contains a given substring with age condition
SELECT id, name FROM users WHERE name LIKE '%B%' and age < 30;


// in more complicated cases, we can use regular expressions for complex pattern matching.
// REGEXP is not case sensitive (except when used with binary strings).
// match the beginning of a string
SELECT id, name FROM users WHERE name REGEXP '^Br';

// match the end of a string
SELECT id, name FROM users WHERE name REGEXP 'r$';

// match any character (including carriage return and newline)
SELECT id, name FROM users WHERE name REGEXP 'B.';

// n* matches zero or more of a character n
SELECT id, name FROM users WHERE name REGEXP 'Bannn*er';

// n+ matches one or more of a character n
SELECT id, name FROM users WHERE name REGEXP 'Bannn+er'; // will NOT return anything
SELECT id, name FROM users WHERE name REGEXP 'Bann+er'; // will return one thing

// A match can be performed against more than one word with the | character
SELECT id, name FROM users WHERE name REGEXP 'Wayne|Banner';



// order/sort results (in ascending order)
SELECT * FROM users ORDER BY name;

// order/sort results in descending order
SELECT * FROM users ORDER BY name DESC;

// order/sort results by multiple columns, first by name ascending, and second by age descending
SELECT * FROM users ORDER BY species, age DESC;
SELECT * FROM users ORDER BY species DESC, age DESC;


// place a limit on the ordered/sorted results
SELECT * FROM users ORDER BY name, species DESC LIMIT 3;




// aggregate data by computing the average age
SELECT AVG(age) FROM users;

// aggregate data by computing the average age for females
SELECT AVG(age) FROM users WHERE gender = 'F';

// aggregate data by computing the average age for males
SELECT AVG(age) FROM users WHERE gender = 'M';

// aggregate data by computing the average age for females and males by group
SELECT gender, AVG(age) FROM users GROUP BY gender;

// aggregate data to count the number of users with age greater than 30
SELECT COUNT(*) FROM users WHERE age > 30;



// before using UPDATE and DELETE to modify data .... first show the result we will update
SELECT * FROM users WHERE name = 'Pocahontas';

// use UPDATE to modify data (single column entry) of a row.... Pocahontas wants a shorter username and email!
UPDATE users SET username = 'pocahontas', email = 'pocahontas@example.com' WHERE name = 'Pocahontas';

// show all results after update
SELECT * FROM users;

// use UPDATE to modify data (multiple column entries) of a row .... Snoopy wants to be cool and change his name and email!
UPDATE users SET name = 'Joe Cool', email = 'joecool@example.com' WHERE username = 'snoopy';

// show all results after update and before delete
SELECT * FROM users;

// use delete to delete all rows with this condition (in this case just one row)
DELETE FROM users WHERE name = 'Fred Flintstone';

// show all results after delete
SELECT * FROM users;

// Be careful!!
DELETE FROM USERS;

// create a second table with posts
CREATE TABLE posts(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	message VARCHAR (255) NOT NULL,
	date_stamp DATE NOT NULL,
	FOREIGN KEY (user_id) REFERENCES users(id)
	);


// use insert to populate the posts table (faster to do this from a file or copy/paste!!!)
INSERT INTO posts (user_id, message, date_stamp) VALUES (7, 'That''s the secret to life... replace one worry with another...', '2015-04-13');
INSERT INTO posts (user_id, message, date_stamp) VALUES (8, 'Good grief Charlie Brown!', 20150414);
INSERT INTO posts (user_id, message, date_stamp) VALUES (1, 'woof! woof!', 20150415);
INSERT INTO posts (user_id, message, date_stamp) VALUES (9, 'Sometimes it''s only madness that makes us what we are!!', 20150421);
INSERT INTO posts (user_id, message, date_stamp) VALUES (5, 'whats up doc?', 20150416);
INSERT INTO posts (user_id, message, date_stamp) VALUES (6, 'Hulk Smash!!', 20150420);
INSERT INTO posts (user_id, message, date_stamp) VALUES (2, 'Don''t let the door hit you in the back on the way out.', 20150417);
INSERT INTO posts (user_id, message, date_stamp) VALUES (3, 'Ha! I see you have a sword! I have one too!', 20150418);
INSERT INTO posts (user_id, message, date_stamp) VALUES (4, 'Yabba Dabba Doo!!', 20150418);
INSERT INTO posts (user_id, message, date_stamp) VALUES (6, 'I don''t think we should be focusing on Loki. That guy''s brain is a bag full of cats. You can smell crazy on him.', 20150419);
INSERT INTO posts (user_id, message, date_stamp) VALUES (9, 'Its me, Batman!', 20150423);
INSERT INTO posts (user_id, message, date_stamp) VALUES (2, 'Who is that?', 20150422);
INSERT INTO posts (user_id, message, date_stamp) VALUES (1, 'woof! woof! woof!', 20150417);



// use join to link the two tables by columns that have the same id.
// here, we will join the users with their posts, by linking them via the id
SELECT * FROM users JOIN posts ON users.id = posts.user_id;

// just display the name, time, and message
SELECT name, date_stamp, message FROM users JOIN posts ON users.id = posts.user_id;

// now sort it by date
SELECT name, date_stamp, message FROM users JOIN posts ON users.id = posts.user_id ORDER BY date_stamp;

// here, we will join with a where clause with a single condition
// show date ordered posts after a certain date
SELECT name, date_stamp, message FROM users JOIN posts ON users.id = posts.user_id WHERE date_stamp > 20150417 ORDER BY date_stamp;

// here, we will join with a where clause with multiple conditions
// show date ordered posts after a certain date from two users
SELECT name, date_stamp, message FROM users JOIN posts ON users.id = posts.user_id WHERE date_stamp > 20150417 and name = 'Bruce Wayne' or name = 'Natalia Romanova' ORDER BY date_stamp;



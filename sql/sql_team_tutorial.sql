-- 1. Create a file called 'create-tables.sql'
----------------------------------------------
-- Put all of the commands required for creating your database tables into that file.
-- This makes it so much easier to reproduce your database on several machines for
-- development and to reset if you ever need to change anything or accidentally delete
-- something that you shouldn't have.

-- 2. Create another file called 'queries.sql'
---------------------------------------------
-- Run all of the SELECT, UPDATE, and DELETE queries from the mysql console first. Then
-- copy all of the query commands that you used into this file (along with a comment explaining
-- what it does). This makes it easier to remember any queries that you may need to use in
-- the future.

-- You will turn in copies of both files at the end of class.

-- (put in create-tables.sql) Use your webdev database from this point on.
USE webdev;

-- (put in create-tables.sql) Drop table if it already exists so you can start fresh each time.
DROP TABLE IF EXISTS users;

-- (put in create-tables.sql) Create a users table in your database.
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR (256) NOT NULL,
	name VARCHAR (50) NOT NULL,
        age INT NOT NULL
);

-- Make sure that this worked. Show that the new blank table is empty
SELECT * FROM users;

-- (put in create-tables.sql) Use insert to populate the users table with your team members.
-- You should have 3 insert commands (one for each team member...your age can be made up :).
INSERT INTO users (email, password, name, age) VALUES('snoopy@peanuts.com', 'w00fWOOF', 'Snoopy', 7);
INSERT INTO users (email, password, name, age) VALUES('scooby@whereareyou.com', 'w00fWOOF', 'Scooby', 9);
INSERT INTO users (email, password, name, age) VALUES('snowwhite@disney.com', 'iLov3AppleZ', 'Snow White', 18);

-- Write a select statement to show all table contents
SELECT * FROM users;

-- TODO: Write a select statement to select the email column from the users table


-- TODO: Write a select statement to select the email and name columns from the users table


-- TODO: Write a select statement to filter where name equals snoopy.
SELECT * FROM users WHERE name = 'Snoopy';

-- TODO: Write a select statement to filter where age equals 7.


-- TODO: Write a select statement to filter where age less than or equal to 18.


-- TODO: Write a select statement that checks if the user with email 'snoopy@peanuts.com' and password 'w00fWOOF' exists.
-- Where would this be helpful in your website?


-- Write a select statement to filter where age is between 7 and 33.
SELECT * FROM users WHERE age between 7 AND 33;

-- TODO: Write a select statement to filter where age is between 7 and 33 and name = snoopy.


-- in most cases in MariaDB, the simple pattern matching provided by LIKE is sufficient. LIKE has two types of matches:
-- 1) _ the underscore, matching a single character
-- 2) % the percentage sign, matching any number of characters

-- TODO: Write a select statement to select the id and name of users whose names start with 'Sn' followed by 4 additional characters.
SELECT id, name FROM users WHERE name LIKE 'Sn____';

-- TODO: Write a select statement to select the id and name of users whose names start with 'S' followed by 5 additional characters.


-- Filter with like operator to filter strings. the '%' is a wildcard placeholder for pattern specifications
-- Filter text that starts with a given prefix
SELECT id, name FROM users WHERE name LIKE 'S%';

-- TODO: Write a select statement to select the id and name of users whose names contain an 'o'.


-- TODO: Write a select statement to select the id and name of users whose names contain an 'o' AND whose age is less than 18.


-- Order/sort results (in ascending order)
SELECT * FROM users ORDER BY name;

-- Order/sort results in descending order
SELECT * FROM users ORDER BY name DESC;

-- Order/sort results by multiple columns, first by name ascending, and second by age descending
SELECT * FROM users ORDER BY name ASC, age DESC;
SELECT * FROM users ORDER BY name DESC, age ASC;

-- Place a limit on the ordered/sorted results
SELECT * FROM users ORDER BY name DESC LIMIT 3;


-- Aggregate data by computing the average age
SELECT AVG(age) FROM users;

-- TODO: Aggregate data by computing the average age for users whose names start with S



-- Aggregate data to count the number of users with age greater than 30
SELECT COUNT(*) FROM users WHERE age > 30;

-- TODO: Aggregate data to count the number of users whose names start with S



-- Before using UPDATE and DELETE to modify data .... first show the result we will update
SELECT * FROM users WHERE email = 'snowwhite@disney.com';

-- Use UPDATE to modify column of a row.... Snow White wants to change her password.
UPDATE users SET password = 'Appl3sAr3bad' WHERE email = 'snowwhite@disney.com';

-- show all results after update
SELECT * FROM users;

-- Use UPDATE to modify data (multiple column entries) of a row .... Snoopy wants to be cool and change his name and email!
-- TODO: Update snoopy's name to 'Joe Cool' and password to 'j03c00l'.


-- show all results after update and before delete
SELECT * FROM users;

-- Use delete to delete all rows with this condition (in this case just one row)
DELETE FROM users WHERE name = 'Joe Cool';

-- show all results after delete
SELECT * FROM users;

-- What does this do? (oops!)
DELETE FROM users;

-- Reload your tables using the script. Hopefully you saved your initial entries so you don't have to do everything again.


-- (put in create-tables.sql) Create a second table with messages
CREATE TABLE posts (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_id INT NOT NULL,
	message VARCHAR (255) NOT NULL,
	posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	FOREIGN KEY (user_id) REFERENCES users(id)
);

-- (put in create-tables.sql) Use insert to populate the posts table (faster to do this from a file or copy/paste!!!)
-- TODO: Why do we have a SELECT statement inside of our INSERT statement? What is this doing?
INSERT INTO posts (user_id, message) VALUES (
	(SELECT id FROM users WHERE email='snoopy@peanuts.com'), 'woof! woof! woof!');
INSERT INTO posts (user_id, message, posted) VALUES (
	(SELECT id FROM users WHERE email='snoopy@peanuts.com'), 'woof! woof!', '2015-09-22 12:00:02');
INSERT INTO posts (user_id, message) VALUES (
	(SELECT id FROM users WHERE email='scooby@whereareyou.com'), 'Scoobie Doobie Doo!');
-- TODO: Insert a few more messages for different users.


-- Use join to link the two tables by columns that have the same id.
-- here, we will join the users with their posts, by linking them via the id
SELECT * FROM users JOIN posts ON users.id = posts.user_id;

-- Display only the name, time, and message
SELECT email, posted, message FROM users JOIN posts ON users.id = posts.user_id;

-- TODO: Select the same as above, but order by email.



-- Here, we will filter using a where clause with a join. Show posts after a certain date
SELECT email, posted, message FROM users JOIN posts ON users.id = posts.user_id WHERE posted < 20150925 ORDER BY posted;


-- TODO: Select email, posted date, and message from users join posts where the posted date is after 20150925 and the user is Snoopy or Scooby (ordered by date).
SELECT username, posted, message FROM users JOIN posts ON users.id = posts.user_id WHERE posted > 20150417 AND username = 'batman' OR username = 'blackwidow' ORDER BY posted;

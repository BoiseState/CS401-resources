-- These are comments (lines starting with '--').
-- Use your webdev database from this point on.
USE webdev;

-- Drop table if it already exists so you can start fresh each time.
DROP TABLE IF EXISTS users;

-- Create a users table in your database.
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR (256) NOT NULL,
	name VARCHAR (50) NOT NULL,
	age INT
);

-- Insert test data into your table so you have something to start with.
INSERT INTO users (email, password, name, age) VALUES('snoopy@peanuts.com', 'w00fWOOF', 'Snoopy', 7);
INSERT INTO users (email, password, name) VALUES('scooby@whereareyou.com', 'w00fWOOF', 'Scooby');
INSERT INTO users (email, password, name) VALUES('snowwhite@disney.com', 'iLov3AppleZ', 'Snow White');

-- TODO: Add 3 more insert statements to populate the users table with your team members.
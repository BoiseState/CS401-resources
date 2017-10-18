-- Drop table first.
DROP TABLE IF EXISTS users;

-- Create a table in database.
CREATE TABLE users (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL,
	name VARCHAR(50) NOT NULL,
	level INT DEFAULT 0
);

-- Use insert to populate the users table
INSERT INTO users (email, password, name, level) VALUES('snoopy@peanuts.com', 'woofwoof', 'Snoopy', 5);
INSERT INTO users (email, password, name, level) VALUES('charliebrown@peanuts.com', 'goodgrief', 'Charlie Brown', 3);
INSERT INTO users (email, password, name, level) VALUES('lucy@peanuts.com', 'secret', 'Lucy van Pelt', 5);

-- Show the tables in the webdev db.
SHOW TABLES;

-- Show contents in the users table in the webdev db.
DESCRIBE users;

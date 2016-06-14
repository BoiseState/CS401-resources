-- To run this script, use the following command on webdev
-- mysql -u csstudent -p < create-table.sql
--     (enter csstudent password when prompted)

-- Use your webdev database.
USE webdev;

-- Drop table first.
DROP TABLE IF EXISTS tasks;

-- Create a table in database.
CREATE TABLE tasks (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	description VARCHAR(255) NOT NULL,
	details VARCHAR(2000),
	priority ENUM('low', 'medium', 'high', 'critical'),
	position INTEGER NOT NULL
);

-- Use insert to populate the test table
INSERT INTO tasks (description, details, priority, position)
		VALUES('Take out the trash', 'Do it.', 'low', 0);
INSERT INTO tasks (description, details, priority, position)
		VALUES('Write code.', 'And write it well.', 'high', 1);

-- Show the tables in the webdev db.
SHOW TABLES;

-- Show contents in the test table in the webdev db.
SELECT * FROM tasks;

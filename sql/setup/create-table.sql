-- To run this script, use the following command on webdev
-- mysql -u csstudent -p < create-table.sql
--     (enter csstudent password when prompted)

-- Use your webdev database.
USE webdev;

-- Drop table first.
DROP TABLE IF EXISTS test;

-- Create a table in database.
CREATE TABLE test (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(100) NOT NULL UNIQUE
);

-- Use insert to populate the test table
INSERT INTO test (email) VALUES('snoopy@doghouse.com');
INSERT INTO test (email) VALUES('charliebrown@doghouse.com');
INSERT INTO test (email) VALUES('lucy@doghouse.com');

-- Show the tables in the webdev db.
SHOW TABLES;

-- Show contents in the test table in the webdev db.
SELECT * FROM test;

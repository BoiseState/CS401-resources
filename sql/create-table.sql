-- To run this script, use the following command at the mysql prompt 
-- source create-table.sql;

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

-- Show the tables in the db.
SHOW TABLES;

-- Show contents in the test table in the db.
SELECT * FROM test;

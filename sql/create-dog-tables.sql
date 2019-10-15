-- To run this script, use the following command at the mysql prompt 
-- source create-table.sql;

-- Drop tables first.
DROP TABLE IF EXISTS dogs_breeds;
DROP TABLE IF EXISTS breeds;
DROP TABLE IF EXISTS dogs;

-- Create dog table in database.
CREATE TABLE dogs (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(32) NOT NULL,
  gender VARCHAR(1),
  size ENUM('small', 'medium', 'large', 'extra-large'),
  birthday DATE,
  adopted BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE breeds (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  breed VARCHAR(32) NOT NULL
);

CREATE TABLE dogs_breeds (
  dogs_id INT NOT NULL,
  breeds_id INT NOT NULL,
  PRIMARY KEY (dogs_id, breeds_id)
);

-- Use insert to populate the dogs table
INSERT INTO dogs (name, gender, size, birthday) VALUES('Tigger', 'M', 'small', '2004-8-10');
INSERT INTO dogs (name, gender, size, birthday) VALUES('Norman', 'M', 'medium', '1992-10-2');
INSERT INTO dogs (name, gender, size, birthday) VALUES('Cassie', 'F', 'large', '2019-7-12');
INSERT INTO dogs (name, gender, size) VALUES('Phoebe', 'F', 'small');
INSERT INTO dogs (name, gender, size) VALUES('Piper',  'F', 'small');
INSERT INTO dogs (name, gender, size) VALUES('Prue',   'F', 'small');
INSERT INTO dogs (name, gender, size) VALUES('Bennet', 'M', 'large');

-- Use insert to populate the breeds table
INSERT INTO breeds (breed) VALUES('Beagle');
INSERT INTO breeds (breed) VALUES('Labrador Retriever');
INSERT INTO breeds (breed) VALUES('Pug');
INSERT INTO breeds (breed) VALUES('Bulldog');
INSERT INTO breeds (breed) VALUES('Poodle');
INSERT INTO breeds (breed) VALUES('Terrier Mix');

INSERT INTO dogs_breeds VALUES(1, 3);
INSERT INTO dogs_breeds VALUES(2, 1);
INSERT INTO dogs_breeds VALUES(3, 2);
INSERT INTO dogs_breeds VALUES(4, 6);
INSERT INTO dogs_breeds VALUES(5, 6);
INSERT INTO dogs_breeds VALUES(6, 6);
INSERT INTO dogs_breeds VALUES(7, 2);

-- Show the tables in the db.
SHOW TABLES;

-- Show contents of the tables in the db.
SELECT * FROM dogs;
SELECT * FROM breeds;
SELECT * FROM dogs_breeds;



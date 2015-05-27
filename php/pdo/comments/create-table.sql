DROP TABLE IF EXISTS comments;

CREATE TABLE comment (
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	comment VARCHAR(255) NOT NULL
);

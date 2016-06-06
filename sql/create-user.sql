-- To run this script, use the following command on webdev
-- mysql -u root -p < create-user.sql
--     (enter root password when prompted)

-- Intentionally broken. Fix this to use a password of your choice.
-- CREATE user 'csstudent'@'localhost' IDENTIFIED BY 'yourpassword';
CREATE user 'csstudent'@'localhost' IDENTIFIED BY ;
GRANT ALL PRIVILEGES ON webdev.* TO 'csstudent'@'localhost' WITH GRANT OPTION;

SELECT User FROM mysql.user WHERE User = 'csstudent';
SHOW GRANTS FOR 'csstudent'@'localhost';

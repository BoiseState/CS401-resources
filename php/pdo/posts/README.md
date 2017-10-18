# Users and Posts
This example demonstrates the use of a users table and a posts table for
managing posts on a simple web page.

## Setup
To create tables needed in this example, source the create-tables.sql script:

```
source create-tables.sql;
```

## Users Table
The users table has the following schema.
```
 +------------+--------------+------+-----+---------+----------------+
 | Field      | Type         | Null | Key | Default | Extra          |
 +------------+--------------+------+-----+---------+----------------+
 | id         | int(11)      | NO   | PRI | NULL    | auto_increment |
 | username   | varchar(50)  | NO   | UNI | NULL    |                |
 | password   | varchar(50)  | NO   |     | NULL    |                |
 | first_name | varchar(50)  | NO   |     | NULL    |                |
 | last_name  | varchar(50)  | NO   |     | NULL    |                |
 | email      | varchar(100) | NO   |     | NULL    |                |
 | species    | varchar(100) | NO   |     | human   |                |
 | gender     | char(1)      | NO   |     | NULL    |                |
 | age        | int(11)      | NO   |     | NULL    |                |
 +------------+--------------+------+-----+---------+----------------+
```

## Posts Table
This posts table has the following schema.

```
+---------+--------------+------+-----+-------------------+-----------------------------+
| Field   | Type         | Null | Key | Default           | Extra                       |
+---------+--------------+------+-----+-------------------+-----------------------------+
| id      | int(11)      | NO   | PRI | NULL              | auto_increment              |
| user_id | int(11)      | NO   | MUL | NULL              |                             |
| message | varchar(255) | NO   |     | NULL              |                             |
| posted  | timestamp    | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
+---------+--------------+------+-----+-------------------+-----------------------------+
```

## Dao.php
Contains database connection and queries for accessing the webdev database.

## posts.php
Demonstrates how to use the Dao to access data from the users and posts tables.

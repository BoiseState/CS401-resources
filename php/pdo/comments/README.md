# Comments
This example demonstrates the use of a comments table managing comments on a simple web page.

## Setup
To create tables needed in this example, source the create-table.sql script :

```
source create-table.sql;
```

## Comments Table
The comments table has the following schema.
```
+---------+--------------+------+-----+-------------------+-----------------------------+
| Field   | Type         | Null | Key | Default           | Extra                       |
+---------+--------------+------+-----+-------------------+-----------------------------+
| id      | int(11)      | NO   | PRI | NULL              | auto_increment              |
| created | timestamp    | NO   |     | CURRENT_TIMESTAMP | on update CURRENT_TIMESTAMP |
| comment | varchar(255) | NO   |     | NULL              |                             |
+---------+--------------+------+-----+-------------------+-----------------------------+
```

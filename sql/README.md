# MariaDB Setup on webdev VMs
1. Checkout this repo from git on webdev.

    ```
    git clone https://github.com/BoiseState/CS401-resources.git
    ```
    
    Change into this directory
    
    ```
    cd CS401-resources/sql
    ```

1. Configure MariaDB using the following command-line executable. 
    There is no root password to start, so just hit enter. Then enter your chosen root password.
    Answer 'y' to all the prompts.

    ```
    $ mysql_secure_installation
    ```

2. Create your webdev database. (Enter your root password when prompted).

    ```
    $ mysql -u root -p < create-webdev-db.sql
    ```
    

3. Create your webdev database user. (Enter your root password when prompted)
    You will need to open this file with vim and edit the line with your chosen password.

    ```
    $ mysql -u root -p < create-user.sql
    ```

4. Create your first table. (Enter your csstudent password when prompted)
   
    ```
    $ mysql -u csstudent -p < create-table.sql
    ```
    
5. After your table is created, log into the mysql shell using

    ```
    $ mysql -u csstudent -p webdev
    ```

6. At the mysql prompt, execute the following query

    ```sql
    mysql> SELECT * FROM test;
    ```

7. You can create your own `create-tables.sql` file containing the schema and insert statements for your own tables.
    Then, anytime you want to create your tables on a new machine, you just need to execute the sql script. (You may
    also need to create the database and csstudent using the `create-webdev-db.sql` and `create-user.sql` scripts
    if it is your first time using the system for development.)

<?php

$localhost_db_url = "mysql://root:root@localhost/webdev?reconnect=true";

// If cleardb is not set assume we are localhost, not Heroku.
if(!getenv("CLEARDB_DATABASE_URL")) 
{
	putenv("CLEARDB_DATABASE_URL=$localhost_db_url"); 
}
?>

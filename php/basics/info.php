<?php
// Can turn errors on in php.in

# Print PHP Configuration table.
phpinfo();

# Can turn errors on in php.ini on apache
#   display_errors = on
# Set max execution time.
#   max_execution_time = 30
?>

<pre>
<?php echo print_r($_SERVER["HTTP_USER_AGENT"], 1); ?>
</pre>

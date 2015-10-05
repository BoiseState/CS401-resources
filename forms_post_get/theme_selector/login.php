<html>
<head>
  <title>Theme Selector Demo</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<h3>Form POSTing to external page</h3>
<p>Let's write a login handler to demonstrate how we can use the submitted values.</p>
<!-- <form method="post" action="http://cs.boisestate.edu/~marissa/classes/401/param&#45;tester.php"> -->
<form method="post" action="login_handler.php">
  <fieldset>
  <legend>Login</legend>
    <div>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" />
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" name="password" id="password"/>
    </div>
    <div>
      View:
      <input type="radio" name="view" value="basic" checked="checked"/> Basic
      <input type="radio" name="view" value="fantastical"/> Fantastical
      <input type="radio" name="view" value="cosmic"/> Cosmic
    </div>
    <div>
      <input name="postSubmitButton2" type="submit" value="Log In"/>
    </div>
  </fieldset>
</form>
</body>
</html>

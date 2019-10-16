<html>
<head>
  <title>Request Parameters Demo</title>
  <!-- placing stying in here for convenience -->
  <style>
  body {
    font-family: Arial, sans-serif;
    font-size: 16px;
  }
  samp, code {
    margin-left: 10px;
    padding: 10px;
    background-color: #FFFFCC;
    border: 1px dashed #FF3399;
    display: block;
    font-size: 14pt;
  }
  div.space {
    height: 200px;
  }

  fieldset {
    width: 50%;
    margin: 0px auto;
  }

  #poll > fieldset {
    width: 45%;
    display: inline;
    margin: 1%;
    float: left;
  }

  form > fieldset > div {
    padding: 5px 0px;
  }

  form .submit {
    margin-top: 20px;
    text-align: center;
  }
  </style>
</head>
<body>
<h1>Query Strings and Parameters</h1>
  <p>A <em>query string</em> is a set of parameters passed from the browser to the
  web server.
  </p>
  <samp>
  URL?name=value&amp;name=value
  </samp>
  <ul>
    <li>Much like passing parameters to a function, where your target script is the function.</li>
    <li>Parameters are name/value pairs.</li>
    <li>We can handle the parameters using PHP.</li>
  </ul>
  <p>
    When we want to search for something on Google, we can pass a query parameter to Google's search
    page.
  </p>
  <samp>
  <a href="https://www.google.com/search?q=Boise+State+University">https://www.google.com/search?q=Boise+State+University</a>
  </samp>
  <p>
  <h2>Handling Parameters in PHP</h2>
  <p><a href="http://php.net/manual/en/language.variables.superglobals.php">PHP Superglobals</a> are built-in variables that
  are always in scope. Request parameters are available in the <var>$_REQUEST</var>, <var>$_GET</var>, and <var>$_POST</var>
  super global associative arrays.</p>
  <p>We can see the values of these arrays using my handy-dandy
  <a href="http://cs.boisestate.edu/~marissa/classes/401/param-tester.php">param-tester</a>. Try passing different parameters
  to see what we get.</p>
  <samp>
  <a href="http://cs.boisestate.edu/~marissa/classes/401/param-tester.php?color=blue&lang=en-us">http://cs.boisestate.edu/~marissa/classes/401/param-tester.php?color=blue&lang=en-us</a>
  </samp>
  <p>To access a specific parameter from one of the arrays, we can index into the array using the parameter name. Here is
  an example using the generic <var>$_REQUEST</var> array.</p>
<code><pre>
if(!empty($_REQUEST)) {
  if(isset($_REQUEST["user"]) && !empty($_REQUEST["user"])) {
    $user = $_REQUEST["user"];
  }
}
</pre></code>
  <p>However, it is always best to use the specific array for the request method used.</p>
<code><pre>
if(!empty($_GET)) {
  if(isset($_GET["user"]) && !empty($_GET["user"])) {
    $user = $_GET["user"];
  }
}
</pre></code>
  <p>Try passing a "user" parameter to this script. Something should show up in the box below.</p>
  <samp>
<?php
if(!empty($_GET)) {
  if(isset($_GET["user"]) && !empty($_GET["user"])) {
    $user = $_GET["user"];
?>
  <p>Hello <?= $user ?>! You are awesome! &bigstar;</p>
<?php
  }
}
?>
</samp>
<h1>Form Basics</h1>
<p>A form is a group of UI controls that accepts information from the user and sends the information to the server as a query string.</p>
<samp><pre>
<?php
echo htmlspecialchars('<form action="">') . "\n";
echo htmlspecialchars('   <!-- input elements -->') . "\n";
echo htmlspecialchars('</form>');
?>
</pre></samp>
<p>The <em>action</em> attribute defines the target URL for the script that will handle
the form.
<ul>
  <li>If the <em>action</em> is left blank, the form will submit to itself (e.g. this page).</li>
  <li>By default, the form is sent via a GET request.</li>
  <li>We can change to POST using the <var>method</var> attribute.</li>
</ul>
</p>
<h2>Submitting a form</h2>
<h3>Simple, default form</h3>
<form action="">
    <input type="submit"/>
</form>
<p>We can determine how it was submitted using the <var>$_SERVER["REQUEST_METHOD"]</var> variable.</p>
Your form was submitted using <?= $_SERVER["REQUEST_METHOD"]; ?>.</p>

<h3>Form with input sending GET request to external page</h3>
<form action="http://cs.boisestate.edu/~marissa/classes/401/param-tester.php">
  <div>
    <label>Username: <input type="input" name="user"/></label>
    <input name="getSubmitButton" type="submit" value="Click me!"/>
  </div>
</form>

<h2>HTTP GET vs POST</h2>
<ul>
  <li><strong>GET:</strong> asks a server for page or data.
    <ul>
      <li>If the request has params, they are sent in the URL as a query string.</li>
      <li>URLs limited in length (~2083 characters)</li>
      <li>Can remain in browser history</li>
      <li>Can be bookmarked</li>
      <li>Can be distributed and shared</li>
      <li>Can be hacked. Private data in URLs can be seen or modified by users</li>
    </ul>
  </li>
  <li><strong>POST:</strong> submits data to a web server and retrieves the server's response
    <ul>
      <li>If the request has params, they are embedded in the request's HTTP packet.</li>
      <li>Use when submitting data to be saved (especially sensitive data).</li>
    </ul>
  </li>
</ul>

<h3>Form with input POSTing to external page</h3>
<form action="http://cs.boisestate.edu/~marissa/classes/401/param-tester.php" method="POST">
  <div>
    <label>Username: <input type="input" name="user"/></label>
    <input name="postSubmitButton" type="submit" value="No, click ME!"/>
  </div>
</form>

<p>Also see <a href="post_get_basics/form_get.php">form_get.php</a>, <a href="post_get_basics/form_post.php">form_post.php</a> and <a href="post_get_basics/form_post.php">form_post_submit.php</a> </p>

<h3>Another Example</h3>
<p>Let's write a login handler to demonstrate how we can use the submitted values. Also see <a href="theme_selector/login.php">theme selector</a> example.</p>
<form method="post" action="http://cs.boisestate.edu/~marissa/classes/401/param-tester.php">
<!-- <form method="post" action="login_handler.php"> -->
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

<h3>Form Elements</h3>
<form id="poll" method="post" action="poll-handler.php" enctype="multipart/form-data">
  <fieldset>
  <legend>Random Poll of the Day</legend>
    <div>
      <label for"name">Name: <input type="text" name="name" id="name" value="Your name here" /></label>
      <label for"age">Age: <input type="text" name="age" id="age" size="3" maxlength="3" /></label>
    </div>
    <div>
      <label for"password">Password: <input type="password" name="password" id="password"/></label>
    </div>
    <div>
      <span>Are you awake?</span>
      <label><input type="radio" name="awake" value="yes" checked="checked" /> Yes</label>
      <label><input type="radio" name="awake" value="no" /> No</label>
    </div>
    <div>
      <span>Which drinks would you like?</span>
      <label><input type="checkbox" name="coffee" checked="checked"/>Coffee</label>
      <label><input type="checkbox" name="orange" />Orange Juice</label>
      <label><input type="checkbox" name="water" />Water</label>
    </div>
    <div>
      <textarea name="comments" rows="4" cols="20">Your comments here.</textarea>
    </div>
    <!-- <div> -->
      <label>Would you like to upload a file?</label>
      <input type="file" name="random_file" size="60"/> <!-- Make sure to set the enctype attribute in form element tag -->
    </div>
    <input type="hidden" name="secret" value="shhhh" />
  </fieldset>

  <!-- START HTML 5 ONLY... MAY NOT BE SUPPORTED ON ALL BROWSERS -->
  <fieldset>
    <legend>HTML 5 Elements</legend>
      <div>
        <label for"name">Name:<input type="text" name="name" id="name" placeholder="your name here" autocomplete="off" required/></label>
        <label for"age">Age: <input type="number" name="age" id="age" min="18" max="150" /></label>
      </div>
      <div>
        <label for="favorite_color">Favorite Color</label>
       <input type="color" name="favorite_color" id="favorite_color"/>
      </div>
      <div>
        <label>What type of vehicle?</label>
        <input list="vehicles" name="vehicle">
        <datalist id="vehicles">
          <option value="Truck">
          <option value="Car">
          <option value="Suv">
          <option value="Bike">
          <option value="Moped">
        </datalist>
      </div>
      <div>
        <label for="how_much">How much?</label>
        <input type="range" name="how_much" id="how_much" min="0" max="50" step="10"/>
      </div>
      <div>
        <label for="birthday">When is your birthday?</label>
        <input type="date" name="birthday" id="birthday"/>
      </div>
      <div>
        <label for="email">Email</label>
        <input type="email" name="email" />
      </div>
      <div>
        <label for="homepage">Homepage</label>
        <input type="url" name="homepage" id="homepage">
      </div>
      <div>
        <label>Would you like to upload a picture?</label>
        <!-- NOTE that the accept parameter is new and not very reliable. -->
        <input type="file" name="picture" accept="image/jpeg|image/gif|image/png"/>
      </div>
  </fieldset>
  <!-- END HTML 5 ONLY... MAY NOT BE SUPPORTED ON ALL BROWSERS -->
  <div class="submit">
    <input type="reset" value="Reset Poll"/>
    <input type="submit" value="Submit Poll"/>
  </div>
</form>

<div class="space"><!-- this is just so the people in the back can see the bottom of the page --></div>
</body>
</html>

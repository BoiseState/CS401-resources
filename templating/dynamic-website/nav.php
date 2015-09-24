<body>
  <div id="header">
    <div class="logo">
      <img src="images/cs401_logo.png" alt="CS401 Logo" />
    </div>
    <div class="text">
      <h1>CS 401 - <small>Intro to Web Dev</small></h1>
    </div>
  </div>
  <div id="navigation">
    <ul>
      <li <?php if($thisPage == "Home") { echo 'id="currentpage"'; } ?>><a href="index.php">Home</a></li>
      <li <?php if($thisPage == "Assignments") { echo 'id="currentpage"'; } ?>><a href="assignments.php">Assignments</a></li>
      <li <?php if($thisPage == "Resources") { echo 'id="currentpage"'; } ?>><a href="resources.php">Resources</a></li>
    </ul>
  </div>


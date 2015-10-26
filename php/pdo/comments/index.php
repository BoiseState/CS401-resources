<html>
  <head>
    <title>Post-Redirect-Get</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h1>Incorrect Attempt at Handling New Comments</h1>
    <a href="comment-incorrect.php">Click here to leave a comment</a>
    <p>Try refreshing the page after posting a comment. When a web form is submitted
       to a server through an HTTP POST request, a web user that attempts to refresh
       the server response in certain user agents can cause the contents of the
       original HTTP POST request to be resubmitted, possibly causing undesired
       results, such as a duplicate web purchase or comment.
    </p>
    <a href="https://en.wikipedia.org/wiki/File:PostRedirectGet_DoubleSubmitProblem.png"><img src="http://2.bp.blogspot.com/-W8peELU3KYw/UXlr63tIglI/AAAAAAAABcw/hdRCLdCEYHc/s1600/PostRedirectGet_DoubleSubmitProblem.png" alt="Post Redirect Get - Double Submit Problem" /></a>
    <h1>Handling New Comments Using Post/Redirect/Get (PRG)</h1>
    <a href="comment.php">Click here to leave a comment</a>
    <p>Try refreshing the page after posting a comment. This is much better.
        Post/Redirect/Get is a web design pattern that prevents duplicate POST
        requests.
    </p>
    <a href="https://en.wikipedia.org/wiki/File:PostRedirectGet_DoubleSubmitSolution.png"><img src="http://2.bp.blogspot.com/-oAXcVCGwkKc/UXlt3ilPrKI/AAAAAAAABc8/Wx6NLo56Boo/s1600/PostRedirectGet_DoubleSubmitSolution.png" alt="Post Redirect Get - Double Submit Solution" /></a>
  </body>
</html>


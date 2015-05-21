<html>
<head>
</head>
<body>

<p>Request URL: <?= $_SERVER['REQUEST_URI']; ?></p>
<p>Request method: <?= $_SERVER['REQUEST_METHOD']; ?></p>

<p>
$_REQUEST: request parameters:
<pre><?= var_dump($_REQUEST); ?></pre>
</p>

<p>
$_GET: get parameters:
<pre><?= var_dump($_GET); ?></pre>
</p>

<p>
$_POST: post parameters:
<pre><?= var_dump($_POST); ?></pre>
</p>

<p>
$_SERVER: server variables:
<pre><?= var_dump($_SERVER); ?></pre>
</p>

</body>
</html>

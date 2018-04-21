<?php
session_start();
require_once('models/users.php');

$condition = "error";
if (!$_SERVER['REQUEST_METHOD'] === 'GET')
{
	echo ("REQUEST_METHOD ERROR\n");
	header('index.php');
	return;
}
else if ($_GET['email'] == "" || $_GET['token'] == "")
{
	echo ("ERROR\n");
	header('index.php');
	return;
}

$user = get_user($_GET['email']);
if ($user == false)
{
	$condition = "no_user";
}
else if ($user['token'] == $_GET['token'])
{
	$active = activate_user($_GET['email']);
	$condition = "activated";
	$_SESSION["logged_in_user"] = $user['id_user'];
}
else
{
	$condition = "wrong_token";
}
?>

<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    

</head>
<body>
<div id="header">
	<div id="header_wrap">
		<a href=""><h1>Commorragh</h1></a>
		<div id="auth">
			<a href=""><div>Signn in</div></a>
			<a href="" style="margin-left: 25px;"><div>Register</div></a>
		</div>
	</div>
</div>

<!-- main -->
<div id="main">
	<div id="register_wrap">
		<p><?php echo($condition) ?></p>
	</div>
</div>
<!-- main end -->

<div id="footer">
	<p>&#169 rkhilenk 2018</p>
</div>
<script src="auth.js"></script>
</body>
</html>
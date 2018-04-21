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
	$condition = "1";
}
else
{
	$condition = "wrong_token";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Recover password</title>
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
		<?php if ($condition == "1"): ?>
		<form onsubmit="recover(this)">
			<h1>Recover password</h1>
			<div><input id="r_pwd_inp" type="password" name="password" placeholder="Password" required minlength="6"></div>
			<p id="password_error" class="none">wrong password</p>
			<div id="r_email" class="none"><?php echo $user[email] ?></div>
			<button style="width: 200px" type="submit" id="register_btm">Change password</button>
		</form>
		<?php else : ?>
			<p>ERROR</p>
		<?php endif; ?>
	</div>
</div>
<!-- main end -->

<div id="footer">
	<p>&#169 rkhilenk 2018</p>
</div>
<script src="auth.js"></script>
</body>
</html>
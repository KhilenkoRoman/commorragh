<?php
	session_start();
?>
<html>
<head>
	<title>Sign in</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">

</head>
<body>
<?php include("header.php");?>

<!-- main -->
<div id="main">
	<div id="register_wrap">
		<form onsubmit="sign_in(this)">
			<h1>Sign in</h1>
			<div><input id="s_email_inp" type="email" name="email" placeholder="Email" required></div>
			<p id="email_error" class="none">wrong email</p>
			<div><input id="s_pwd_inp" type="password" name="password" placeholder="Password" required minlength="6"></div>
			<p id="password_error" class="none">wrong password</p>
			<button type="submit" id="register_btm">Sign in</button>
			<a href="./forgot_pwd.php">Forgot password ?</a>
		</form>
	</div>
</div>
<!-- main end -->

<?php include("footer.php");?>
</div>
<script src="auth.js"></script>
</body>
</html>
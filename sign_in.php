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
		<form onsubmit="sign_in(this)">
			<h1>Sign in</h1>
			<div><input id="s_email_inp" type="email" name="email" placeholder="Email" required></div>
			<p id="email_error" class="none">wrong email</p>
			<div><input id="s_pwd_inp" type="password" name="password" placeholder="Password" required minlength="6"></div>
			<p id="password_error" class="none">wrong password</p>
			<button type="submit" id="register_btm">Sign in</button>
			<a href="">Forgot password ?</a>
		</form>
	</div>
</div>
<!-- main end -->

<div id="footer">
	<p>&#169 rkhilenk 2018</p>
</div>
<script src="auth.js"></script>
</body>
</html>
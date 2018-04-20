<?php
session_start();
?>
<!DOCTYPE html>
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
		<form onsubmit="register(this)">
			<h1>Registrarion</h1>
			<div><input id="r_email_inp" type="email" name="email" placeholder="Email" required></div>
			<p id="email_error" class="none"></p>
			<div><input id="r_name_inp" type="text" name="name" placeholder="Name" required></div>
			<div><input id="r_pwd_inp" type="password" name="password" placeholder="Password" required minlength="6"></div>
			<p id="password_error" class="none">wrong password</p>
			<button type="submit" id="register_btm">Register</button>
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
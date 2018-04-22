<?php
session_start();
?>
<html>
<head>
	<title>Registration</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    

</head>
<body>
<?php include("header.php");?>

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

<?php include("footer.php");?>
</div>
<script src="auth.js"></script>
</body>
</html>
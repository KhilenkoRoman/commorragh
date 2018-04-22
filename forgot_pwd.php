<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgoten pwd</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">

</head>
<body>
<?php include("header.php");?>

<!-- main -->
<div id="main">
	<div id="register_wrap">
		<form onsubmit="forgot_pwd(this)">
			<h1>Forgot password?</h1>
			<div><input id="f_email_inp" type="email" name="email" placeholder="Email" required></div>
			<p id="email_error" class="none">wrong email</p>
			<button style="width: 200px" type="submit" id="register_btm">Send confirmation</button>
			<a href="./sign_in.php">Remembered ?</a>
		</form>
	</div>
</div>
<!-- main end -->

<?php include("footer.php");?>
</div>
<script src="auth.js"></script>
</body>
</html>
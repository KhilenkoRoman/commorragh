<?php
session_start();
?>
<html>
<head>
	<title>Commorragh</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <script src="script.js"></script>

</head>
<body>
<?php include("header.php");?>
<div id="main">
	<div id="index_wrap">

	<?php if (!$_SESSION["logged_in_user"]): ?>

	<a href="./register.php">
	<div class="menu_item">
		<div class="line"></div>
		<p>Register</p>
		<div class="line"></div>
	</div>
	</a>
	<a href="./sign_in.php">
	<div class="menu_item">
		<div class="line"></div>
		<p>Sign in</p>
		<div class="line"></div>
	</div>
	</a>

	<?php else : ?>

	<a href="./photo.php">
	<div class="menu_item">
		<div class="line"></div>
		<p>Take photo</p>
		<div class="line"></div>
	</div>
	</a>

	<?php endif; ?>
	<a href="./galery.php">
	<div class="menu_item">
		<div class="line"></div>
		<p>Galery</p>
		<div class="line"></div>
	</div>
	</a>
	</div>
</div>

<?php include("footer.php");?>
</div>
</body>
</html>

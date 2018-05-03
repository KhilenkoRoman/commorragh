<?php
	session_start();
	if ($_SESSION["logged_in_user"] == "")
		header('Location: ./index.php');
	require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/users.php';
	$user = get_user_by_id($_SESSION["logged_in_user"]);
?>
<html>
<head>
	<title>Prsonal</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">

</head>
<body>
<?php include("header.php");?>

<!-- main -->
<div id="main">
	<div id="id_user_presonal" class="none"><?php echo $user['id_user'] ?></div>
	<div class="users_data">
		<form onsubmit="change_email(this)">
			<p>Change email</p>
			<input type="email" id="presonal_email" value="<?php echo $user['email'] ?>" class="" required>
			<button>Submit</button>
			<p id="email_error" class="error_text none">email_error</p>
		</form>
		<form onsubmit="change_name(this)">
			<p>Change name</p>
			<input id="presonal_name" value="<?php echo $user['name'] ?>" class="" required>
			<button>Submit</button>
			<p id="name_error" class="error_text none">name_error</p>
		</form>
		<form onsubmit="change_pass(this)">
			<p>Change password</p>
			<input type="password" id="old_pass_change" placeholder="Old password" class="" required minlength="6"><br>
			<input type="password" id="new_pass_change" placeholder="New password" class="" required minlength="6">
			<button>Submit</button>
			<p id="password_error" class="error_text none">password_error</p>
		</form>
		<div id="comments_on_email">
			<p>Email on comment</p>
			<?php if ($user["comments_to_mail"] == 1) : ?>
				<input type="checkbox" name="subscribe" id="coment_subscribe_field" checked>
			<?php else : ?>
				<input type="checkbox" name="subscribe" id="coment_subscribe_field">
			<?php endif; ?>
		</div>
	</div>
</div>
<!-- main end -->

<?php include("footer.php");?>
</div>
<script src="user.js"></script>
</body>
</html>
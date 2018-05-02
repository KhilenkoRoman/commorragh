<?php
	session_start();
	if ($_SESSION["logged_in_user"] == "")
		header('Location: ./index.php');
	require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/users.php';
	$user = get_user_by_id($_SESSION["logged_in_user"]);
	var_dump($user);
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
			<input type="email" id="presonal_email" value="<?php echo $user['email'] ?>">
			<button>Submit</button>
		</form>
		<form onsubmit="change_name(this)">
			<p>Change name</p>
			<input id="presonal_name" value="<?php echo $user['name'] ?>">
			<button>Submit</button>
		</form>
		<form onsubmit="change_pass(this)">
			<p>Change password</p>
			<input type="password" id="old_pass_change" placeholder="Old password"><br>
			<input type="password" id="new_pass_change" placeholder="New password">
			<button>Submit</button>
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
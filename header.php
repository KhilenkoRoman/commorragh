<?php
session_start();
include_once('models/users.php');
if ($_SESSION["logged_in_user"])
	$user = get_user_by_id($_SESSION["logged_in_user"]);
$actual_link = $_SERVER[REQUEST_URI];
?>
<div id="header">
	<div id="header_wrap">
		<a href="index.php"><h1>Commorragh</h1></a>
		<?php if (!$_SESSION["logged_in_user"]): ?>
			<div id="auth">
				<a href="sign_in.php"><div>Sign in</div></a>
				<a href="register.php" style="margin-left: 25px;"><div>Register</div></a>
			</div>
		<?php else : ?>
			<div id="auth">
				<a href="">User: <span><?php echo $user['name'] ?></span></a>
            	<a href="controler/logout.php?link=<?php echo $actual_link ?>" style="margin-left: 25px;">Logout</a></li>
            </div>
        <?php endif; ?>
	</div>
</div>

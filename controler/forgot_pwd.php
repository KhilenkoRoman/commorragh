<?php
require_once('../models/users.php');
require_once('mail.php');

session_start();
if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR\n");
	return (0);
}
if ($_POST['email'] == "")
{
	echo ("ERROR\n");
	return (0);
}


$user = get_user($_POST['email']);

if($user == false)
{
	echo('no_such_user');
	return;
}
else
{
	$token = md5($email.time());
	user_update_token($user['email'], $token);
	$message = "<br><br> To recover your password go to <br><br> http://localhost:8080/commorragh/recover.php?email=".$user['email']."&token=".$token;
	ft_send_email($user['email'], 'Cammorragh password recovery', $message);
	echo('1');
	return;
}
?>
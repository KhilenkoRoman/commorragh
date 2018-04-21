<?php
session_start();
require_once('../models/users.php');

if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR\n");
	return (0);
}
if ($_POST['email'] == "" || $_POST['pwd'] == "")
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
else if($user[password] != hash('sha512', $_POST['pwd']))
{
	echo('wrong_pwd');
	return;
}
else
{
	$_SESSION["logged_in_user"] = $user['id_user'];
	echo('1');
	return;
}
?>
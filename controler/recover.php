<?php
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
$password = hash('sha512', $_POST['pwd']);
user_update_pwd($_POST['email'], $password);
echo('1');
return;

?>
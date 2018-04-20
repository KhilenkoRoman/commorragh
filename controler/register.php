<?php
session_start();
require_once('../config/dbconnect.php');
require_once('mail.php');



if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR\n");
	return (0);
}
if ($_POST['email'] == "" || $_POST['name'] == "" || $_POST['pwd'] == "")
{
	echo ("ERROR\n");
	return (0);
}

if(strlen($_POST['pwd']) < 6)
{
	echo ("pwd_short");
	return;
}

$regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
if(preg_match($regex, $_POST[email]))
{
	$sql = "SELECT email FROM users";
	$result = sql_req($sql);
	foreach ($result as $value)
	{
		if ($value[email] == $_POST[email])
		{
			echo ("email_exist");
			return;
		}
	}
} 
else
{
	echo ("wrong_email");
	return (0);
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = hash('sha512', $_POST['pwd']);
$token = md5($email.time());

$message = "Tnx for registrarion <br><br> To activate your account go to <br><br> http://localhost:8080/commorragh/activate.php?email=".$email."&token=".$token;
ft_send_email($_POST[email], 'Cammorragh registration', $message);



$sql = "INSERT INTO users (email, name, password, token)
VALUES ('$email', '$name', '$password', '$token')";
$result = sql_send($sql);
echo "$result";


?>
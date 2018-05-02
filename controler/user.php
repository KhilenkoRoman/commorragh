<?php
// require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/pictures.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/users.php';
// require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/likes.php';
session_start();

if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR NOT POST\n");
	return (0);
}

if ($_POST["function"] == "subscribe_on")
{
	if (subscribe_change($_POST["id_user"], 1))
		echo "check";
	else
		echo "ERROR";
}

if ($_POST["function"] == "subscribe_off")
{
	if (subscribe_change($_POST["id_user"], 0))
		echo "uncheck";
	else
		echo "ERROR";
}

if ($_POST["function"] == "change_email")
{
	if ($_POST['id_user'] == "" || $_POST['email'] == "")
	{
		echo ("ERROR\n");
		return (0);
	}
	change_email($_POST["id_user"], $_POST["email"]);
}


function change_email($id_user, $email)
{
	$regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
	if(preg_match($regex, strtolower($email)))
	{
		$emails = get_all_users_emails();
		foreach ($emails as $value)
		{
			if ($value[email] == $email)
			{
				echo ("email_exist");
				return;
			}
		}
	}
	else
	{
		echo ("wrong_email");
		return;
	}
	$email = htmlspecialchars($email);
	if (user_update_email($id_user, $email))
		echo "1";
	else
		echo "ERROR DB";
	
}






















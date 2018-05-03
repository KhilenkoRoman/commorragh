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

if ($_POST["function"] == "change_name")
{
	if ($_POST['id_user'] == "" || $_POST['name'] == "")
	{
		echo ("ERROR\n");
		return (0);
	}
	change_name($_POST["id_user"], $_POST["name"]);
}

if ($_POST["function"] == "change_password")
{
	if ($_POST['id_user'] == "" || $_POST['old_pwd'] == "" || $_POST['new_pwd'] == "")
	{
		echo ("ERROR\n");
		return (0);
	}
	change_password($_POST["id_user"], $_POST["old_pwd"], $_POST["new_pwd"]);
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

function change_name($id_user, $name)
{
	if (strlen($name) > 30)
	{
		echo ("long_name");
		return;
	}
	$name = htmlspecialchars($name);
	if (user_update_name($id_user, $name))
		echo "1";
	else
		echo "ERROR";
}

function change_password($id_user, $old_pwd, $new_pwd)
{
	$user = get_user_by_id($id_user);
	$old_hash = hash('sha512', $old_pwd);

	if (strlen($new_pwd) > 6 || strlen($old_pwd) > 6)
	{
		echo "short";
		return ;
	}
	if ($old_pwd == $new_pwd)
	{
		echo "same_pwd";
		return ;		
	}
	if ($user["password"] != $old_hash)
	{
		echo "wrong_password";
		return ;
	}

	$new_hash = hash('sha512', $new_pwd);
	if (user_update_pwd_by_id($id_user, $new_hash))
		echo "1";
	else
		echo "ERROR";
}






















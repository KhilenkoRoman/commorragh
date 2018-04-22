<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/config/dbconnect.php';

function get_user($email)
{
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = sql_req($sql);
	if (count($result) == 1)
		return ($result[0]);
	else
		return false;
}

function get_user_by_id($id)
{
	$sql = "SELECT * FROM users WHERE id_user='$id'";
	$result = sql_req($sql);
	if (count($result) == 1)
		return ($result[0]);
	else
		return false;
}

function activate_user($email)
{
	$sql = "UPDATE users SET active = 1, token = NULL WHERE email='$email'";
	$result = sql_send($sql);
	if ($result == true)
		return true;
	else
		return false;
}

function user_update_token($email, $token)
{
	$sql = "UPDATE users SET token = '$token' WHERE email='$email'";
	$result = sql_send($sql);
	if ($result == true)
		return true;
	else
		return false;
}

function user_update_pwd($email, $pwd)
{
	$sql = "UPDATE users SET password = '$pwd', token = NULL WHERE email='$email'";
	$result = sql_send($sql);
	if ($result == true)
		return true;
	else
		return false;
}


?>

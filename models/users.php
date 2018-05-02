<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/config/dbconnect.php';

function create_user($email, $name, $password, $token)
{
	$sql = "INSERT INTO users (email, name, password, token) VALUES (:email, :name, :password, :token)";
	$array = array('email' => $email, 'name' => $name, 'password' => $password, 'token' => $token);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function get_user($email)
{
	$sql = "SELECT * FROM users WHERE email= :email ";
	$array = array('email' => $email);
	$result = sql_req($sql, $array);
	if (count($result) == 1)
		return ($result[0]);
	else
		return false;
}

function get_all_users_emails()
{
	$sql = "SELECT email FROM users";
	$array = array();
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function get_user_by_id($id)
{
	$sql = "SELECT * FROM users WHERE id_user= :id ";
	$array = array('id' => $id);
	$result = sql_req($sql, $array);
	if (count($result) == 1)
		return ($result[0]);
	else
		return false;
}

function activate_user($email)
{
	$sql = "UPDATE users SET active = 1, token = NULL WHERE email= :email ";
	$array = array('email' => $email);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function subscribe_change($id_user, $subscribe)
{
	$sql = "UPDATE users SET comments_to_mail = :subscribe WHERE id_user= :id_user ";
	$array = array('subscribe' => $subscribe, 'id_user' => $id_user);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function user_update_token($email, $token)
{
	$sql = "UPDATE users SET token = :token WHERE email= :email ";
	$array = array('email' => $email, 'token' => $token);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function user_update_pwd($email, $pwd)
{
	$sql = "UPDATE users SET password = :pwd , token = NULL WHERE email= :email ";
	$array = array('email' => $email, 'pwd' => $pwd);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function user_update_email($id_user, $email)
{
	$sql = "UPDATE users SET email = :email WHERE id_user= :id_user ";
	$array = array('id_user' => $id_user, 'email' => $email);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}
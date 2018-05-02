<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/config/dbconnect.php';

function add_like_to_db($id_user, $id_pic)
{
	$sql = "INSERT INTO likes SET id_user = :id_user , id_pic = :id_pic";
	$array = array('id_user' => $id_user, 'id_pic' => $id_pic);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function remove_like_from_db($id_user, $id_pic)
{
	$sql = "DELETE FROM likes WHERE id_user = :id_user AND id_pic = :id_pic";
	$array = array('id_user' => $id_user, 'id_pic' => $id_pic);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function get_likes_from_db($id_user, $id_pic)
{
	$sql = "SELECT COUNT(id_like) FROM likes WHERE id_user = :id_user AND id_pic = :id_pic";
	$array = array('id_user' => $id_user, 'id_pic' => $id_pic);
	$result = sql_req($sql, $array);
	if ($result)
		return $result;
	else
		return false;
}




<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/config/dbconnect.php';

function comment_to_db($id_user, $id_pic, $comment_text)
{
	$sql = "INSERT INTO comments SET id_user = :id_user , id_pic = :id_pic , comment = :comment_text ";
	$array = array('id_user' => $id_user, 'id_pic' => $id_pic, 'comment_text' => $comment_text,);
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function comment_from_db($id_pic)
{
	$sql = "SELECT * FROM comments WHERE id_pic = :id_pic ORDER BY date_creation DESC";
	$array = array('id_pic' => $id_pic);
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

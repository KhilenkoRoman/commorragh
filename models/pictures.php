<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/config/dbconnect.php';

function picture_to_db($id_user, $pic)
{
	$sql = "INSERT INTO pictures SET id_user = '$id_user', pic = '$pic'";
	$result = sql_send($sql);
	if ($result == true)
		return true;
	else
		return false;
}

function picture_from_db($from, $to)
{
	$sql = "SELECT * FROM pictures ORDER BY 'date_creation' LIMIT $from, $to";
	$result = sql_req($sql);
	if ($result)
		return ($result);
	else
		return false;
}
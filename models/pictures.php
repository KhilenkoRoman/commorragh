<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/config/dbconnect.php';

function picture_to_db($id_user, $pic)
{
	$sql = "INSERT INTO pictures SET id_user = :id_user , pic = :pic ";
	$array = array('id_user' => $id_user, 'pic' => $pic );
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}

function picture_from_db($start)
{
	$start = (int)$start;
	$sql = "SELECT * FROM pictures ORDER BY date_creation DESC LIMIT 5 OFFSET ".$start;
	$array = array();
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function picture_qty_from_db()
{
	$start = (int)$start;
	$sql = "SELECT COUNT(id_pic) FROM pictures";
	$array = array();
	$result = sql_req($sql, $array);
	if ($result[0])
		return ($result[0]);
	else
		return false;
}

function can_load_pictures_from_db($start)
{
	$start = (int)$start;
	$sql = "SELECT id_pic FROM pictures LIMIT 5 OFFSET ".$start;
	$array = array();
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function get_picture_info_by_id($id_pic)
{
	$id_pic = (int)$id_pic;
	$sql = "SELECT id_pic, id_user, date_creation FROM pictures WHERE id_pic = :id_pic";
	$array = array('id_pic' => $id_pic);
	$result = sql_req($sql, $array);
	if ($result)
		return ($result);
	else
		return false;
}

function remove_picture_from_db($id_pic, $id_user)
{
	$sql = "DELETE FROM pictures WHERE id_pic = :id_pic AND id_user = :id_user";
	$array = array('id_pic' => $id_pic, 'id_user' => $id_user );
	$result = sql_send($sql, $array);
	if ($result == true)
		return true;
	else
		return false;
}


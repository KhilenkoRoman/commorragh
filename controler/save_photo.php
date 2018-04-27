<?php
require_once('../models/pictures.php');

if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR\n");
	return (0);
}
if ($_POST['id_user'] == "" || $_POST['pic'] == "")
{
	echo ("ERROR\n");
	return (0);
}
$photo = str_replace(' ','+',$_POST['pic']);

if (picture_to_db($_POST['id_user'], $photo) == true);
	echo('1');
return;
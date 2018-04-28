<?php
require_once('../models/comments.php');
require_once('../models/users.php');

if (!$_SERVER['REQUEST_METHOD'] === 'POST')
{
	echo ("ERROR");
	return (0);
}
if ($_POST['gal_id_user'] == "" || $_POST['gal_id_pic'] == "" || $_POST['text'] == "")
{
	echo ("ERROR");
	return (0);
}
if (comment_to_db($_POST['gal_id_user'], $_POST['gal_id_pic'], $_POST['text']) == true)
{
	$user = get_user_by_id($_POST['gal_id_user']);
	echo($user[name]);
}
else
	echo('ERROR');
return;

?>
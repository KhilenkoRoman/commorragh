<?php
require_once('../models/comments.php');
require_once('../models/users.php');
require_once('mail.php');

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

$comment_text = htmlspecialchars($_POST['text']);

if (comment_to_db($_POST['gal_id_user'], $_POST['gal_id_pic'], $comment_text) == true)
{
	$user = get_user_by_id($_POST['gal_id_user']);
	$pic_user = get_user_by_pic_id($_POST['gal_id_pic']);
	if($pic_user[0][comments_to_mail] == "1")
	{
		$message = "One of your pictures has been comented by some rediska called <b>".$user[name]."</b><br><br>
		Comment: ".$comment_text."";

		ft_send_email($pic_user[0]["email"], 'Cammorragh new comment', $message);
	}
	echo($user[name]);
}
else
	echo('ERROR');
return;

?>
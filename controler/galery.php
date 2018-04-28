<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/pictures.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/users.php';
session_start();

function get_pictures($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;


	$pictures = picture_from_db(($page - 1)*5);

	// var_dump($pictures);

	foreach ($pictures as $picture)
	{	
		echo '<div class="g_item">
			<div class="none gal_id_pic">'.$picture[id_pic].'</div>
			<div class="photo">
				<img src="'.$picture[pic].'">
				<i class="fas fa-heart like_btn"></i>
			</div>
			<div class="coments_wrap" >
			<div class="comments">';

		$comments = comment_from_db($picture[id_pic]);

		foreach ($comments as $comment)
		{
			$user = get_user_by_id($comment[id_user]);

			echo '<div class="comment">
				<p class="author">'.$user[name].'</p>
					<p>'.$comment[comment].'</p>
				</div>';
		}
		echo '</div>
			<button onclick="expand_coment(this)">expand  <i class="fas fa-angle-down"></i></button>';

		if ($_SESSION["logged_in_user"])
		{
			echo'<button onclick="coment_input(this)">add comment  <i class="fas fa-angle-down"></i></button>
			<form class="c_input i_deployed" onsubmit="comment_send(this)">
				<textarea required maxlength="1000"></textarea>
				<button>comment</button>
			</form>';
		}

		echo '</div>	
		</div>';
	}
}
?>

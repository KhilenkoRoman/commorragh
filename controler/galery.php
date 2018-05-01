<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/pictures.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/users.php';
session_start();

if ($_POST["function"] == "get_more_pictures")
{
	echo get_pictures($_POST["page"]);
	echo can_load($_POST["page"]);
}

function get_pictures($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;


	$pictures = picture_from_db(($page - 1)*5);

	// тупит 
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

function pagination($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;

	$pic_qty = (int)picture_qty_from_db()["COUNT(id_pic)"];
	$pages_qty = ceil($pic_qty / 5);

	if ($page == 1)
	{
		echo '<a disabled="true"><i class="fas fa-angle-left disabled"></i></a>';
	}
	else
	{
		echo '<a href="./galery.php?pg='.($page - 1).'"><i class="fas fa-angle-left"></i></a>';
	}

	for ($i=1; $i <= $pages_qty; $i++)
	{
		if ($i == $page)
		{
			echo '<a disabled="true" class="current">'.$i.'</a>';
		}
		else
		{
			echo '<a href="./galery.php?pg='.($i).'">'.$i.'</a>';
		}
		
	}
	
	if ($page == $pages_qty)
	{
		echo '<a  disabled="true"><i class="fas fa-angle-right disabled"></i></a>';
	}
	else
	{
		echo '<a href="./galery.php?pg='.($page + 1).'"><i class="fas fa-angle-right"></i></a>';
	}
}

function can_load($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;


	$result = can_load_pictures_from_db($page * 5);
	if ($result)
	{
		echo '<div class="load_more">
		<p id="load_more_btn" onclick="load_more(this)">Load '.count($result).' more pictures</p>
		</div>';
	}
	// var_dump(count($result));
}
?>

<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/pictures.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/comments.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/users.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/likes.php';
session_start();

if ($_POST["function"] == "get_more_pictures")
{
	echo get_pictures($_POST["page"]);
	echo can_load($_POST["page"]);
}

if ($_POST["function"] == "add_like")
{
	add_like($_POST["id_pic"], $_POST["id_user"]);
}

if ($_POST["function"] == "remove_like")
{
	remove_like($_POST["id_pic"], $_POST["id_user"]);
}

if ($_POST["function"] == "remove_foto")
{
	remove_foto($_POST["id_pic"]);
}


function get_pictures($page)
{
	$page = (int)$page;
	if ($page == NULL)
		$page = 1;


	$pictures = picture_from_db(($page - 1)*5);
	// $_SESSION["logged_in_user"]);
	// тупит 
	// var_dump($pictures);

	foreach ($pictures as $picture)
	{	
		echo '<div class="g_item">
			<div class="none gal_id_pic">'.$picture[id_pic].'</div>
			<div class="photo">
				<img src="'.$picture[pic].'">';

		if ($_SESSION["logged_in_user"])
		{
			$like = get_likes_from_db($_SESSION["logged_in_user"], $picture[id_pic]);
			if ($like[0]["COUNT(id_like)"] == 0)
			{
				echo '<i class="fas fa-heart like_btn" onclick="like_func(this)"></i>';
			}
			else
			{
				echo '<i class="fas fa-heart like_btn liked" onclick="like_func(this)"></i>';
			}
		}

		if ($picture['id_user'] == $_SESSION["logged_in_user"])
		{
			echo '<i class="fas fa-times cross_btn" onclick="remove_foto('.$picture['id_pic'].')"></i>';
		}
		
		echo '</div>
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

	// $pages_qty отображает реальное кол-во страниц
	// $pages_qty = 100;
	// $page = 98;

	// prev
	if ($page == 1)
	{
		echo '<a disabled="true"><i class="fas fa-angle-left disabled"></i></a>';
	}
	else
	{
		echo '<a href="./galery.php?pg='.($page - 1).'"><i class="fas fa-angle-left"></i></a>';
	}
	// prev

	if ($pages_qty < 9)
	{
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
	}
	else
	{
		if ($page > 2)
		{
			echo '<a href="./galery.php?pg=1">1</a>';
			echo '<a disabled="true"> .. </a>';
		}
		if ($page != 1)
		{
			echo '<a href="./galery.php?pg='.($page - 1).'">'.($page - 1).'</a>';
		}
		echo '<a disabled="true" class="current">'.$page.'</a>';
		if ($page != $pages_qty)
		{
			echo '<a href="./galery.php?pg='.($page + 1).'">'.($page + 1).'</a>';
		}
		if ($page != $pages_qty - 1 && $page != $pages_qty)
		{
			echo '<a disabled="true"> .. </a>';
			echo '<a href="./galery.php?pg='.$pages_qty.'">'.$pages_qty.'</a>';
		}
	}

	
	
	// next
	if ($page == $pages_qty)
	{
		echo '<a  disabled="true"><i class="fas fa-angle-right disabled"></i></a>';
	}
	else
	{
		echo '<a href="./galery.php?pg='.($page + 1).'"><i class="fas fa-angle-right"></i></a>';
	}
	// next
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

function add_like($id_pic, $id_user)
{
	if (add_like_to_db($id_user, $id_pic))
	{
		echo "add_like_sucsess";
	}
	else
	{
		echo "ERROR";
	}
	
}

function remove_like($id_pic, $id_user)
{
	if (remove_like_from_db($id_user, $id_pic))
	{
		echo "remove_like_sucsess";
	}
	else
	{
		echo "ERROR";
	}	
}

function remove_foto($id_pic)
{
	$pic_data = get_picture_info_by_id($id_pic)[0];
	// var_dump($pic_data);

	if ($pic_data['id_user'] == $_SESSION["logged_in_user"])
	{
		if (remove_picture_from_db($pic_data['id_pic'], $_SESSION["logged_in_user"]))
		{
			echo "1";
			return;
		}
		else
		{
			echo "ERROR_DB";
			return ;
		}
	}
	else
	{
		echo "ERROR_USER";
		return ;
	}
}

?>


















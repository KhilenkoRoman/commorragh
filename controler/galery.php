<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/commorragh/models/pictures.php';

function get_pictures($page)
{
	if ($page == NULL)
		$page = 1;
	$pictures = picture_from_db(($page - 1)*5, ($page - 1)*5 + 5);

	foreach ($pictures as $picture)
	{	
		echo '<div class="g_item">
			<div class="photo">
				<img src="'.$picture[pic].'">
				<i class="fas fa-heart like_btn"></i>
			</div>
			<div class="coments_wrap" >
			<div class="comments">
				<div class="comment">
				<p class="author">qwerty</p>
					<p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределениек</p>
				</div>
				<div class="comment">
					<p class="author">qwerty</p>
					<p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределениек</p>
				</div>
				<div class="comment">
					<p class="author">qwerty</p>
					<p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределениек</p>
				</div>
				<div class="comment">
					<p class="author">qwerty</p>
					<p>Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределениек</p>
				</div>
			</div>
			<button onclick="expand_coment(this)">expand  <i class="fas fa-angle-down"></i></button>
			<button onclick="coment_input(this)">add comment  <i class="fas fa-angle-down"></i></button>
			<form class="c_input i_deployed">
				<textarea></textarea>
				<button>comment</button>
			</form>
			</div>	
		</div>';
	}
}
?>

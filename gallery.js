function expand_coment(item)
{
	// console.log(item);
	var comments = item.previousElementSibling;
	comments.classList.toggle('c_deployed');
	// console.log(item.innerHTML);
	if (item.innerHTML == 'expand  <i class="fas fa-angle-down"></i>')
		item.innerHTML = 'retract  <i class="fas fa-angle-up"></i>';
	else
		item.innerHTML = 'expand  <i class="fas fa-angle-down"></i>';
}

function coment_input(item)
{
	// console.log(item);
	var input = item.nextElementSibling;
	// console.log(item.innerHTML);
	input.classList.toggle('i_deployed');
	if (item.innerHTML == 'add comment  <i class="fas fa-angle-down"></i>')
		item.innerHTML = 'add comment  <i class="fas fa-angle-up"></i>';
	else
		item.innerHTML = 'add comment  <i class="fas fa-angle-down"></i>';
}

function comment_send(item)
{
	event.preventDefault();
	const gal_id_user = document.getElementById('gal_id_user').innerHTML;
	const gal_id_pic = item.parentNode.parentNode.getElementsByClassName('gal_id_pic')[0].innerHTML;
	const text = item.getElementsByTagName("textarea")[0];
	const coment_area = text.parentElement;
	const comments = item.parentNode.getElementsByClassName('comments')[0]

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			coment_area.classList.toggle('i_deployed');
			if (response != "ERROR")
			{
				console.log(comments);
				var com_el = document.createElement("div");
				com_el.classList.add('comment');
				comments.insertBefore(com_el,comments.firstChild);
				var paragraf = document.createElement("p");
				paragraf.classList.add('author');
				paragraf.innerHTML = response;
				com_el.appendChild(paragraf);
				var paragraf2 = document.createElement("p");
				paragraf2.innerHTML = text.value;
				com_el.appendChild(paragraf2);	
			}
			text.value = "";

        }
	};
    xmlhttp.open("POST", "controler/save_comment.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("gal_id_user=" + gal_id_user + "&gal_id_pic=" + gal_id_pic + "&text=" + text.value);

	
	// console.log(gal_id_user);
	// console.log(gal_id_pic);
}


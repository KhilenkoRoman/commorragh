var page = 0;

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
				console.log(response);
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
}

function load_more(item)
{
	const galery_elem = document.getElementsByClassName("galery")[0];

	if (page == 0)
	{
		page = document.getElementsByClassName("current")[0].innerHTML;
		page = parseInt(page) + 1;
	}	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;

			document.getElementsByClassName("load_more")[0].remove();
			galery_elem.innerHTML += response;
			page = parseInt(page) + 1;
        }
	};
    xmlhttp.open("POST", "controler/galery.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("function=get_more_pictures&page=" + page);
}

function like_func(item)
{
	var xmlhttp = new XMLHttpRequest();
	const gal_id_user = document.getElementById('gal_id_user').innerHTML;
	const gal_id_pic = item.parentNode.parentNode.getElementsByClassName('gal_id_pic')[0].innerHTML;

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;

			if (response == "add_like_sucsess")
			{
				item.classList.add('liked');
			}
			if (response == "remove_like_sucsess")
			{
				item.classList.remove('liked');
			}
			console.log(response);
        }
	};

	xmlhttp.open("POST", "controler/galery.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	if (item.classList.contains('liked'))
	{
		xmlhttp.send("function=remove_like&id_pic=" + gal_id_pic + "&id_user=" + gal_id_user);
	}
	else
	{
		xmlhttp.send("function=add_like&id_pic=" + gal_id_pic + "&id_user=" + gal_id_user);
	}
}

function remove_foto(id_pic)
{
	if (!confirm("Remove ?"))
	{
		return ;
	}
	// const elem = event.srcElement.parentElement.parentElement;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			if (response == 1)
			{
				location.reload();
			}
        }
	};
    xmlhttp.open("POST", "controler/galery.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("function=remove_foto&id_pic=" + id_pic);
}










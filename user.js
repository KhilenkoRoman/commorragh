const coment_subscribe_field = document.getElementById('coment_subscribe_field');
const id_user = document.getElementById('id_user_presonal').innerHTML;

function comment_subscribe_handler(event)
{
	event.preventDefault();
	event.stopPropagation();
	elem = event.srcElement;
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			if (response == "check")
			{
				elem.checked = true;
			}
			if (response == "uncheck")
			{
				elem.checked = false;
			}
        }
	};
	xmlhttp.open("POST", "controler/user.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	if (elem.checked)
	{
		xmlhttp.send("function=subscribe_on&id_user=" + id_user);
	}
	else
	{
		xmlhttp.send("function=subscribe_off&id_user=" + id_user);
	}
}

function change_email(elem)
{
	event.preventDefault();
	var email = document.getElementById('presonal_email').value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			if (response == 1)
				alert("email changed");
        }
	};
	xmlhttp.open("POST", "controler/user.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("function=change_email&id_user=" + id_user + "&email=" + email);
}

function change_name(elem)
{

}

function change_password(elem)
{

}

coment_subscribe_field.addEventListener('click', (e) => comment_subscribe_handler(e));
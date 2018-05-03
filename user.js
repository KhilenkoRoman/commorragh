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
	email_error = document.getElementById('email_error');
	email_elem = document.getElementById('presonal_email');

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;

			email_error.classList.add('none');
			email_elem.classList.remove('unvalid');
			if (response == "email_exist")
			{
				email_error.classList.remove('none');
				email_error.innerHTML = "Such email already exists";
				email_elem.classList.add('unvalid');
			}
			if (response == "wrong_email")
			{
				email_error.classList.remove('none');
				email_error.innerHTML = "Wrong email";
				email_elem.classList.add('unvalid');
			}
			if (response == "long_email")
			{
				email_error.classList.remove('none');
				email_error.innerHTML = "Email is too long";
				email_elem.classList.add('unvalid');
			}		
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
	event.preventDefault();
	var name = document.getElementById('presonal_name').value;
	var xmlhttp = new XMLHttpRequest();
	name_error = document.getElementById('name_error');
	name_elem = document.getElementById('presonal_name');

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;

			name_error.classList.add('none');
			name_elem.classList.remove('unvalid');

			if (response == "long_name")
			{
				name_error.classList.remove('none');
				name_error.innerHTML = "Name is too long";
				name_elem.classList.add('unvalid');
			}
			if (response == "ERROR")
			{
				name_error.classList.remove('none');
				name_error.innerHTML = "Some error, just panic";
				name_elem.classList.add('unvalid');
			}
			if (response == 1)
				alert("name changed");
        }
	};
	xmlhttp.open("POST", "controler/user.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("function=change_name&id_user=" + id_user + "&name=" + name);
}

function change_pass(elem)
{
	event.preventDefault();
	const old_pwd = document.getElementById('old_pass_change').value;
	const new_pwd = document.getElementById('new_pass_change').value;
	var xmlhttp = new XMLHttpRequest();
	password_error = document.getElementById('password_error');

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			console.log(response);

			password_error.classList.add('none');
			if (response == "short")
			{
				password_error.classList.remove('none');
				password_error.innerHTML = "Password is too short";
			}
			if (response == "same_pwd")
			{
				password_error.classList.remove('none');
				password_error.innerHTML = "Old and New passwords are same";
			}
			if (response == "wrong_password")
			{
				password_error.classList.remove('none');
				password_error.innerHTML = "Wrong password";
			}
			if (response == "ERROR")
			{
				password_error.classList.remove('none');
				password_error.innerHTML = "Some error, just panic";
			}
			if (response == "long_pwd")
			{
				password_error.classList.remove('none');
				password_error.innerHTML = "Password is too long";
			}
			
			if (response == 1)
				alert("password changed");
        }
	};
	xmlhttp.open("POST", "controler/user.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("function=change_password&id_user=" + id_user + "&old_pwd=" + old_pwd + "&new_pwd=" + new_pwd);
}

coment_subscribe_field.addEventListener('click', (e) => comment_subscribe_handler(e));




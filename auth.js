

function register(elem)
{
	event.preventDefault();
	var xmlhttp = new XMLHttpRequest();
	var email = document.getElementById("r_email_inp");
	var pwd = document.getElementById("r_pwd_inp");
	var name = document.getElementById("r_name_inp");
	var email_error = document.getElementById("email_error");
	var pwd_error = document.getElementById("password_error");

	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			email_error.classList.add('none');
			pwd_error.classList.add('none');
			email.classList.remove('unvalid');
			pwd.classList.remove('unvalid');
			var response = xmlhttp.responseText;
			if (response == "email_exist")
			{
				email_error.classList.remove('none');
				email_error.innerHTML = "Such email already exists";
				email.classList.add('unvalid');
			}
			if (response == "wrong_email")
			{
				email_error.classList.remove('none');
				email_error.innerHTML = "Wrong email";
				email.classList.add('unvalid');
			}
			if (response == "pwd_short")
			{
				pwd_error.classList.remove('none');
				pwd_error.innerHTML = "Password should be greater than 5 chars";
				pwd.classList.add('unvalid');
			}
			if (response == "1")
			{
				window.location.replace("index.php");
			}		
        }
	};
    xmlhttp.open("POST", "controler/register.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("email=" + email.value + "&name=" + name.value + "&pwd=" + pwd.value);
}
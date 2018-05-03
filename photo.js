
const fileInput = document.getElementById('file_input');
const target = document.getElementById('target');
const player = document.getElementById('player');
const downloaded_img = document.getElementById('downloaded_img');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
context.translate(640, 0);
context.scale(-1, 1);
const captureButton = document.getElementById('capture');
const captureButton_timer = document.getElementById('capture_timer');
const saveButton = document.getElementById('save_picture_btn');
const filters = document.querySelectorAll('.filter');
const overlay = document.getElementById('overlay');
const previevImg = document.getElementById('previev_img');
const user_id = document.getElementById('user_id').innerHTML;
var is_video = false;
var is_downloaded = false;
const previev_txt = document.getElementById('previev_txt');

// video player

navigator.getUserMedia({video: true, audio: false}, getVideo, videoError);

function getVideo(stream)
{
	is_video = true;
	player.srcObject = stream;
}

function videoError(error)
{
	is_video = false;
	player.classList.add('none');
	target.classList.remove('none');
}

// video player end

//image from webcam

captureButton.addEventListener("click", capture);
captureButton_timer.addEventListener("click", timer_capture);

function capture()
{
	// event.preventDefault();
	if (is_video)
		context.drawImage(player, 0, 0, 640, 480);
	else
		context.drawImage(downloaded_img, 0, 0, 640, 480);


	var image = canvas.toDataURL("image/png");

	var xmlhttp = new XMLHttpRequest();
	var response = xmlhttp.responseText;
	
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			// console.log(response);
			previevImg.src = response;
			previevImg.classList.remove('none');
			saveButton.disabled = false;
			saveButton.classList.remove('disabled');
			previev_txt.classList.add("none");
        }
	};
	xmlhttp.open("POST", "controler/photo.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("overlay=" + overlay.src + "&photo=" + image);
}

function timer_capture()
{
	var counter = 5;

	captureButton.disabled = true;
	captureButton.classList.add('disabled');

	setInterval(function() {
	counter--;
	if (counter >= 0) {
		captureButton_timer.innerHTML = "Timer "+counter+"s";
	}
	if (counter === 0) {
		clearInterval(counter);
		capture();
		captureButton_timer.innerHTML = "Timer 5s";
		captureButton.disabled = false;
		captureButton.classList.remove('disabled');
	}
	}, 1000);
}

//image from webcam end

function file_handler(fileList)
{
	if (fileList[0].type.match(/^image\//) && fileList[0].size < 10000000)
	{
		if (fileList[0] !== null)
		{
		// console.log(fileList[0]);
		// console.log("picture_loaded");

		var file = fileList[0];
		if(file.type !== '' && !file.type.match('image.*'))
        {
        	alert("not an image");
            return;
        }
        window.URL = window.URL || window.webkitURL;
        var imageURL = window.URL.createObjectURL(file);
        // console.log(imageURL);

        is_downloaded = true;
        target.classList.add('none');
        downloaded_img.src = imageURL;  
        downloaded_img.classList.remove('none');
		context.drawImage(downloaded_img, 0, 0, 640, 480);
   		}
	}
}



function filter_handler()
{
	if (is_video == false && is_downloaded == false)
	{
		alert("Please upload image.");
		return;
	}
	if (this.classList.contains('selected_filter'))
	{
		this.classList.remove('selected_filter');
		overlay.classList.add('none');
		overlay.src = "";
		// captureButton.disabled = true;
		// captureButton.classList.add('disabled');

	}		
	else
	{
		filters.forEach(function(elem) {
    		elem.classList.remove('selected_filter');
		});
		this.classList.add('selected_filter');
		overlay.classList.remove('none');
		overlay.src = this.src;
		// captureButton.disabled = false;
		// captureButton.classList.remove('disabled');
	}
}

saveButton.addEventListener("click", photo_saver);

function photo_saver()
{
	var xmlhttp = new XMLHttpRequest();
	var response = xmlhttp.responseText;
	
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			if (response == '1')
			{
				previevImg.removeAttribute("src");
				previevImg.classList.add('none');
				previev_txt.innerHTML = "Photo saved";
				previev_txt.classList.remove("none");
				saveButton.disabled = true;
				saveButton.classList.add('disabled');
			}
			else
				alert(response);
        }
	};
	xmlhttp.open("POST", "controler/save_photo.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("id_user=" + user_id + "&pic=" + previevImg.src);
}



// drag and drop

target.addEventListener('drop', (e) => {
e.stopPropagation();
e.preventDefault();
file_handler(e.dataTransfer.files);
});

target.addEventListener('dragover', (e) => {
e.stopPropagation();
e.preventDefault();
e.dataTransfer.dropEffect = 'copy';
});
// drag and drop end

// file upload
fileInput.addEventListener('change', (e) => file_handler(e.target.files));
// file upload end

filters.forEach(function(elem) {
    elem.addEventListener('click', filter_handler);
});
// filters.addEventListener('click', filter_handler());

// window.addEventListener('load', startup);




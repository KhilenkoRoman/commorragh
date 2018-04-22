var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var camera = document.getElementById('camera');


function startup() {
	navigator.getUserMedia = navigator.getUserMedia ||
		navigator.webkitGetUserMedia ||
		navigator.mozGetUserMedia;

	navigator.getUserMedia({
		video: true,
		audio: false
	}, function (stream)
	{
		window.URL = window.URL || window.webkitURL;
		var streamURL = window.URL.createObjectURL(stream);
		camera.src = streamURL;
		camera.play();
	}
	, function (error)
	{
		console.warn(error);
	});
}

function takePhoto()
{
	context.drawImage(camera, 0, 0, 320, 240);

	var dataUrl = canvas.toDataURL()
	// var	context = previev.getContext('2d');
	// context.drawImage(camera, 0, 0, camera.width, camera.height);

	// var imageURL = previev.toDataURL();
	// var img = document.getElementById('image');
	// img.setAttribute('src', imageURL);
}

document.getElementById("take_picture_btn").addEventListener("click", takePhoto);



window.addEventListener('load', startup);
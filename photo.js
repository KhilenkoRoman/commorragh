function startup() {

	var camera = document.getElementById('camera');

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



window.addEventListener('load', startup);
function startup() {

	navigator.getUserMedia = navigator.getUserMedia ||
		navigator.webkitGetUserMedia ||
		navigator.mozGetUserMedia;

	navigator.getUserMedia({
		video: true,
		audio: false
	}, function (stream)
	{
		console.log(stream);
	}
	, function (error)
	{
		console.warn(error);
	});
}



window.addEventListener('load', startup);

const fileInput = document.getElementById('file_input');
const target = document.getElementById('target');
const player = document.getElementById('player');
const canvas = document.getElementById('canvas');
const context = canvas.getContext('2d');
context.translate(640, 0);
context.scale(-1, 1);
const captureButton = document.getElementById('capture');


// video player

navigator.getUserMedia({video: true, audio: false}, getVideo, videoError);

function getVideo(stream)
{
	player.srcObject = stream;
}

function videoError(error)
{
	console.warn(error);
}

// video player end

//image from webcam

captureButton.addEventListener("click", capture);

function capture()
{
	// event.preventDefault();

	context.drawImage(player, 0, 0, 640, 480);
	var image = canvas.toDataURL("image/png");

	var xmlhttp = new XMLHttpRequest();
	var response = xmlhttp.responseText;
	
	xmlhttp.onreadystatechange = function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			var response = xmlhttp.responseText;
			console.log(response);		
        }
	};

	xmlhttp.open("POST", "controler/photo.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send("photo=" + image);
}

//image from webcam end



function file_handler(fileList)
{
	if (fileList[0].type.match(/^image\//) && fileList[0].size < 10000000)
	{
	if (fileList[0] !== null)
	{
		console.log(fileList[0]);
		console.log("picture_loaded");
		// canvas.src = URL.createObjectURL(fileList[0]);
    }
	}
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


// window.addEventListener('load', startup);














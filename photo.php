<?php
session_start();
if ($_SESSION["logged_in_user"] == "")
	header('Location: ./index.php');
?>
<html>
<head>
	<title>Commorragh</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
</head>
<body>
<?php include("header.php");?>

<!-- main -->
<div style="display: none" id="user_id"><?php echo($_SESSION)["logged_in_user"] ?></div>
<div id="main">
<div id="photo_wrap">
	<div id="photo_section">
		<div id="camera_wrap">
			<img id="overlay" width="640" height="480" class="none" src="./img/1.png">
			<img id="downloaded_img" width="640" height="480" class="none" src="">
			<div id="target" class="none">
				<p>You can drag an image file here</p>
				<p>or upload manualy (suported only 640*480 png)</p>
				<input type="file" accept="image/*" id="file_input">
			</div>
			<video id="player" width="640" height="480" video id="" autoplay></video>
			<canvas id="canvas" width="640" height="480"></canvas>
		</div>
		
		
			<div id="previev_section">
				<div class="previev_box">
					<img id="previev_img" class="none">
					<p id="previev_txt">Previev</p>
				</div>
				<div id="previev_btn">
					<button id="capture" disabled="true" class="disabled">Take photo</button>
					<button id="save_picture_btn" disabled="true" class="disabled">Save photo</button>
				</div>
			</div>
	</div>
	<div id="filter_section">
		<img class="filter" src="./img/1.png">
		<img class="filter" src="./img/2.png">
		<img class="filter" src="./img/3.png">
		<img class="filter" src="./img/4.png">
		<img class="filter" src="./img/5.png">
		<img class="filter" src="./img/6.png">
		<img class="filter" src="./img/7.png">
		<img class="filter" src="./img/8.png">
		<img class="filter" src="./img/9.png">
	</div>

</div>
</div>
<!-- main end -->

<?php include("footer.php");?>
</div>
<script src="photo.js"></script>
</body>
</html>
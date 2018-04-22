<?php
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
<div id="main">
<div id="photo_wrap">
	<div id="photo_section">
		<div id="camera_wrap">
			<img id="overlay" src="./img/1.png"></video>
			<video id="camera" width="640" height="480">
		</div>
			<div id="previev_section">
				<canvas id="canvas"  width="320" height="240"></canvas>
				<div id="previev_btn">
					<button id="take_picture_btn">Take photo</button>
					<button id="save_picture_btn">Save photo</button>
				</div>
			</div>
	</div>
	<div id="filter_section">
		<img src="./img/1.png">
		<img src="./img/2.png">
		<img class="selected_filter" src="./img/3.png">
		<img src="./img/4.png">
		<img src="./img/5.png">
		<img src="./img/6.png">
		<img src="./img/7.png">
		<img src="./img/8.png">
		<img src="./img/9.png">
	</div>

</div>
</div>
<!-- main end -->

<?php include("footer.php");?>
</div>
<script src="photo.js"></script>
</body>
</html>
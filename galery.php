<?php
session_start();
require_once('controler/galery.php');
// if ($_SESSION["logged_in_user"] == "")
// 	header('Location: ./index.php');
?>

<!-- get_pictures($_GET[pg]) -->
<html>
<head>
	<title>Galery</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body>
<?php include("header.php");?>

<!-- main -->
<div id="main">
	<div class="galery">
		<?php get_pictures($_GET[pg]) ?>
	</div>
</div>
<!-- main end -->
<div class="pagination">
		<a href=""><i class="fas fa-angle-left"></i></a>
		<a href="">1</a>
		<a href=""><i class="fas fa-angle-right"></i></a>	
</div>


<?php include("footer.php");?>
</div>
<script src="gallery.js"></script>
</body>
</html>
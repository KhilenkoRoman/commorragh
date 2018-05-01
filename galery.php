<?php
require_once('controler/galery.php');
?>
<html>
<head>
	<title>Galery</title>
	<meta charset="utf-8">
    <link href="styles/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>
<body>
<div class="none" id="gal_id_user"><?php echo $_SESSION["logged_in_user"] ?></div>
<?php include("header.php");?>

<!-- main -->
<div id="main">
	<div class="galery">
		<?php get_pictures($_GET[pg]) ?>
	</div>
	<?php can_load($_GET[pg]) ?>
</div>
<!-- main end -->
<div class="pagination">
	<?php pagination($_GET[pg]) ?>			
</div>


<?php include("footer.php");?>
</div>
<script src="gallery.js"></script>
</body>
</html>
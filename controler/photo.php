<?php
session_start();

$backGround = substr($_POST['photo'], 22);
$backGround = str_replace(' ','+',$backGround);
$backGround = base64_decode($backGround); 
file_put_contents("currentBG1.png", $backGround);

$es = imagecreatefromstring($backGround);
// file_put_contents("currentBG1.png", $_POST['photo']);
// echo "1";

var_dump($es);
// $encodedData = str_replace(' ','+',$_POST['photo']);
// $decocedData = base64_decode($encodedData);

// $image = imagecreatefromstring($_POST['photo']);
// var_dump($image);


// if(preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $_POST['photo'], $matches))
// {
// 	$imageType = $matches[1];
// 	$imageData = base64_decode($matches[2]);

// 	$image = imagecreatefromstring($decodedData);
// }
// var_dump($image);

?>
<?php

// function merge_pictures($gd_photo, $gd_filter)
// {
// 	imagecopy($gd_photo, $gd_filter, 0, 0, 0, 0, imagesx($gd_filter), imagesy($gd_filter));
	// imagepng($gd_photo);
	// $rawImageBytes = ob_get_clean();
	// return "<img src='data:image/jpeg;base64," . base64_encode( $rawImageBytes ) . "' />";
// }

$overlayPath = $_POST[overlay];

// $photo = substr($_POST['photo'], 22);
// $photo = $_POST['photo'];
// $argv[$i] = preg_replace("/\s+/", "", $argv[$i]);
$photo = preg_replace("/^.+base64,/", "", $_POST['photo']);
$photo = str_replace(' ','+',$photo);
$photo = base64_decode($photo); 
// file_put_contents("currentBG1.png", $photo);

$gd_photo = imagecreatefromstring($photo);
$gd_filter = imagecreatefrompng($overlayPath);
// file_put_contents("currentBG1.png", $_POST['photo']);
// echo "1";

// var_dump($gd_photo);
// var_dump($gd_filter);
imagecopy($gd_photo, $gd_filter, 0, 0, 0, 0, imagesx($gd_filter), imagesy($gd_filter));

// var_dump(imagesx($gd_filter));
// var_dump(imagesy($gd_filter));


// $result = base64_encode($gd_photo);


// header('Content-type: image/png');
// imagepng($gd_photo);
// imagedestroy($gd_photo);
// imagedestroy($gd_filter);


ob_start();
	imagepng($gd_photo);
	$image_data = ob_get_contents(); 	
ob_end_clean();

// $image_data = base64_encode($image_data)

echo "data:image/png;base64,".base64_encode($image_data);
// var_dump($image_data);
// echo "string";

// echo "string";
// echo "data:image/jpeg;base64," . base64_encode( $image_data );



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
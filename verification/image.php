<?php

header('Content-type: image/png');

session_start();
$_SESSION['secure'] = str_pad(rand(1,9999),4,'0',STR_PAD_LEFT);
$text = $_SESSION['secure'];
$i = 0;
$random_dots = 30;
$image_width = 100;
$image_height = 30;
$im = imagecreatetruecolor($image_width, $image_height);


$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
imagefilledrectangle($im, 0, 0, 399, 29, $black);

$font = '../font/ReggaeOne-Regular.ttf';

imagettftext($im, 20, 0, 11, 30, $grey, $font, $text);

imagettftext($im, 20, 0, 10, 29, $white, $font, $text);

for($i=0; $i<$random_dots;$i++){
    imagefilledellipse($im,rand(0,$image_width),rand(0,$image_height),2,3,$white);
}

imagepng($im);
imagedestroy($im);
?>
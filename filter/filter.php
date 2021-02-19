<?php
session_start();
$imageBlob = base64_decode($_SESSION['image']);
if (isset($_GET['filter1'])){
    $im = new Imagick();
    $im->readImageBlob($imageBlob);
    $im->borderImage(new ImagickPixel("black"),50,50);
    header("Content-Type: image/png");
    $_SESSION['image'] = base64_encode($im->getImageBlob());
    header('Location: ../editor.php');
}else if (isset($_GET['filter2'])){
    $im = new Imagick();
    $im->readImageBlob($imageBlob);
    $im-> thresholdimage(0.5*Imagick::getQuantum(),134217727);
    header("Content-Type: image/jpg");
    $_SESSION['image'] = base64_encode($im->getImageBlob());
    header('Location: ../editor.php');
}
?>
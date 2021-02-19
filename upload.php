<?php
session_start();
include('config/db.php');
if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    $_SESSION['publicity'] = $_POST['publicity'];
    $file_name = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $_SESSION['fileName'] = $file_name;
    $image = addslashes(file_get_contents($temp_name));
    $_SESSION['temp'] = $image;
    $im = file_get_contents($temp_name);
    $data = base64_encode($im);
    $_SESSION['image'] = $data;
    header('Location: editor.php');
   }
?>
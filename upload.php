<?php
session_start();
include('config/db.php');
if (isset($_POST['submit'])){
    if (! is_uploaded_file($_FILES['file']['tmp_name'])){
        $_SESSION['error'] = 'No File Uploaded';
        header('Location: index.php');
    }else{
    $temp_name = $_FILES['file']['tmp_name'];
    $im = new Imagick($temp_name);
    $file_type = $im->identifyImage()['mimetype'];
    if ($file_type == 'image/jpeg' || $file_type == 'image/gif' || $file_type == 'image/png'){
        $_SESSION['publicity'] = $_POST['publicity'];
        $file_name = $_FILES['file']['name'];
        $file_pattern = '/^([-\.\w\s]+)$/';
        if (preg_match($file_pattern,explode(".",$file_name)[0])){
            $_SESSION['fileName'] = $file_name;
            $image = addslashes(file_get_contents($temp_name));
            $_SESSION['temp'] = $image;
            $im = file_get_contents($temp_name);
            $data = base64_encode($im);
            $_SESSION['image'] = $data;
            if (isset($_SESSION["error"])){
                unset ($_SESSION["error"]);
            }
            $_SESSION['original'] = $data;
            header('Location: editor.php');
        }else{
            $_SESSION['error'] = 'Wrong Format of File Name';
            header('Location: index.php');
        }
    }else{
        $_SESSION['error'] = 'Wrong Extension';
        header('Location: index.php');
    }
   }
}
?>
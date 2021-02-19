<?php
session_start();
include('config/db.php');
$timestamp = date("Y-m-d H:i:s");
$publicity = $_SESSION['publicity'];
$publicity_in_num = $publicity == "public" ? 1 : 0;
$file_name =  $_SESSION['fileName'];
$image = $_SESSION['image'];
$imageToUpload = addslashes(base64_decode($image));
$author_id = $_COOKIE['userid'];
if (isset($_POST['finish'])){
    $sql ="INSERT INTO photo(image_name,image,author_id,timestamp,public) VALUES('$file_name','{$imageToUpload}',$author_id,'$timestamp',$publicity_in_num)";
    if (! mysqli_query($conn,$sql)){
        echo("upload fail");
    }else{
        header('Location: index.php');
    };
}  
?>
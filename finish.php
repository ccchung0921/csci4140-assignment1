<?php
session_start();
include('config/db.php');
$timestamp = date("Y-m-d H:i:s");
$publicity = $_SESSION['publicity'] == "public";
$file_name =  $_SESSION['fileName'];
$image = $_SESSION['image'];
$imageToUpload = pg_escape_bytea(base64_decode($image));
$author_id = $_COOKIE['userid'];
if (isset($_POST['finish'])){
    $sql ="INSERT INTO photo(image_name,image,author_id,timestamp,public) VALUES('$file_name','{$imageToUpload}',$author_id,'$timestamp',$publicity)";
    if (! pg_query($conn,$sql)){
        echo("upload fail");
    }else{
        header('Location: index.php');
    };
}  
?>
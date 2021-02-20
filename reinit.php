<?php
session_start();
include('config/db.php');
if (isset($_SESSION['image'])){
    unset($_SESSION['image']);
}
if (isset($_SESSION['temp'])){
    unset($_SESSION['temp']);
}
if (isset($_SESSION['fileName'])){
    unset($_SESSION['fileName']);
}
if (isset($_SESSION['publicity'])){
    unset($_SESSION['publicity']);
}
$sql = "TRUNCATE photo";
$result = pg_query($conn,$sql);
if (! $result){
    echo('delete error');
}else{
    $sql = "CREATE TABLE IF NOT EXISTS photo(id SERIAL PRIMARY KEY, image_name VARCHAR(50), image bytea, author_id INT, timestamp timestamp, public INT)";
    $result = pg_query($conn,$sql);
    if (! $result){
        echo('create error');
    }else{
        header('Location: init_success.php');
    }
}

?>
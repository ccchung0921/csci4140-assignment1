<?php

$conn = mysqli_connect('localhost','root','password','photo_system');
if (!$conn){
    echo 'Error'. mysqli_connect_error();
}

?>
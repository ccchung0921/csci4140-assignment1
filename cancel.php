<?php
session_start();
$_SESSION['image'] = $_SESSION['original'];
header('Location:editor.php')
?>
<?php
session_start();
unset ($_SESSION["image"]);
header('Location: index.php');
?>
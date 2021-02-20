<?php
session_start();
unset ($_SESSION['image']);
unset ($_SESSION['publicity']);
header('Location: index.php');
?>
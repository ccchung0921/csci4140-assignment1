<?php
    session_start();
if(isset($_COOKIE['username'])){
    unset($_COOKIE['username']);
    unset($_COOKIE['userid']);
    setcookie('username','',time()-3600);
    setcookie('userid','',time()-3600);
    header('Location: index.php');
}
?>
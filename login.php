<?php

include('config/db.php');

session_start();


 

if (isset($_POST['submit'])){
    $userVerification = $_POST['verification'];
    if ($_POST['verification'] == $_SESSION['secure']){
    $username = pg_escape_string($conn,$_POST['username']);
    $password = pg_escape_string($conn,$_POST['password']);

    $sql ="SELECT * from users WHERE username = '$username' AND password = '$password' ";

    $result = pg_query($conn,$sql);

    if (pg_num_rows($result) == 1){
        $user = pg_fetch_assoc($result);
        setcookie('username',$username,time() + 86400);
        setcookie('userid',$user['id'],time() + 86400);
        if ($username == 'admin'){
            header('Location:init.php');
        }else{
            header('Location: index.php');
        }
   }else{
       header('Location: login_error.php');
   }
    }else{
       header('Location: login_error.php');
    }
}




?>

<!DOCTYPE html>
<html>
<head>
    <title>Login page</title>
</head>
<body>
    <section class="container">
    <h3>Photo system</h3>
    <form action="login.php" method="POST">
        <labeL for="username">User name</label>
            <input type="text" name="username">
        <label for="password">Password</label>
            <input type="password" name="password">

        <h5>what's the numbers in the image?</h5>
        <div>
            <input type="text" name="verification">
            <img src="verification/image.php" />
        </div>
        <button type="submit" name="submit">Login</button>
    </form>
    </section>
</body>
</html>

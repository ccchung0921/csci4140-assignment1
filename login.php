<?php

include('config/db.php');

session_start();


 

if (isset($_POST['submit'])){
    $userVerification = $_POST['verification'];
    if ($_POST['verification'] == $_SESSION['secure']){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    $sql ="SELECT * from users WHERE username = '$username' AND password = '$password' ";

    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);
        setcookie('username',$username,time() + 86400);
        setcookie('userid',$user['id'],time() + 86400);
        header('Location: index.php');
   }
    }else{
       echo('wronngggggggg veriication');
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

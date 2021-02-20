<?php

// $conn = mysqli_connect('localhost','root','password','photo_system');
// if (!$conn){
//     echo 'Error'. mysqli_connect_error();
// }
  date_default_timezone_set('Asia/Hong_Kong');
  $host = 'ec2-52-22-161-59.compute-1.amazonaws.com';
  $port = '5432';
  $db = 'd8prnrln96c4ae';
  $user = 'pcqdndzndptcpc';
  $password = '8eaa1dc02b599165e64ede5a70895ca1cd45e5e4ed846028d496861cbd5193ab';
  $conn_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password}";
  $conn = pg_connect($conn_string);
    if (!$conn){
        echo 'Error';
    }
?>
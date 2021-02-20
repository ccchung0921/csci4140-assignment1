<?php



?>

<!DOCTYPE html>
<html>
    <head>
        <title>System Initialization</title>
        <style>
            .main-container{
                display:flex;
                justify-content:center;
            }
            .container{
                border-style:solid;
                padding:30px;
                border-width:1px;
                width: 300px;
                height:300px;
            }
        </style>
    </head>
    <body>
        <div class="main-container">
            <div class="container">
                <h2>System Initialization</h2>
                <p>Important: all data would be deleted</p>
                <button onclick="location.href='reinit.php'">Please Go Ahead</button>
                <button onclick="location.href='index.php'">Go Back</button>
            </div>
        </div>
    </body>
</html>
<?php
session_start();


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <style>
            body{
                background: #1690A7;
                
            }
            .logo-button {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
           
            
            .logo-button button {
                background-color: #999;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border: none;
                cursor: pointer;
                border-radius: 12px;
            }
            .logo-button button img {
                width: 50px;
                height: 50px;
                vertical-align: middle;
                margin-right: 10px;
            }
           
        </style>
    </head>
    <body>
   
        <div class="logo-button">
        <h2>Login here !!</h2> <i class="fa-solid fa-hand-point-right"></i>
            <button onclick="window.location.href='login.php'">
                <img src="Portal-Images.png" alt="Logo"> Login
            </button>
        </div>
    </body>
    </html>
    <?php
} else {
   
    header("Location:home.php");
    exit;
}
?>

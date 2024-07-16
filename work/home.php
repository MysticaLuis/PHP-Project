<?php
include ('connectDB.php');

session_start();

if(isset($_SESSION['user_Id'])){
   $user_id = $_SESSION['user_Id'];
}else{
   $user_id = '';
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home Page</title>
   

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  
   <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
   


<div class="container">
<h2 > Welcome to the Protected Home Page</h2>

    <a href="profile.php">Update Profile</a><br>
    <a href="account.php">Change Password</a><br>
    <a href="holiday.php">View Public Holidays</a><br>
    <a href="logout.php">Logout</a>
</div>

</body>
</html>
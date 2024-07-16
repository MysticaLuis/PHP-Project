<?php
session_start();
if (!isset($_SESSION['user_Id'])) {
    header('location:login.php');
    exit;
}
include ('connectDB.php');

if(isset($_POST['change_password'])) {
    $userId = $_SESSION['user_Id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $user_query = $conn->prepare("SELECT * FROM tbl_users WHERE userId = ?");
    $user_query->execute([$userId]);
    $user = $user_query->fetch(PDO::FETCH_ASSOC);

    if($user['password'] == $old_password) {
        $update_query = $conn->prepare("UPDATE tbl_users SET password = ? WHERE userId = ?");
        $update_query->execute([$new_password, $userId]);
        $message[] = 'Password changed successfully!';
    } else {
        $message[] = 'Old password is incorrect!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>
   

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

  
   <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
   
<div class="container">
    <h2>Change Password</h2>
    <form action="account.php" method="POST">
        <input type="password" name="old_password" placeholder="Old Password" required><br>
        <input type="password" name="new_password" placeholder="New Password" required><br>
        <button type="submit" name="change_password">Change Password</button>
    </form>
</div>


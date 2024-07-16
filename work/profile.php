<?php
session_start();
if (!isset($_SESSION['user_Id'])) {
    header('location:login.php');
    exit;
}
include ('connectDB.php');

if(isset($_POST['update'])) {
    $userId = $_SESSION['user_Id'];
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];
    $city = $_POST['city'];

    $update_query = $conn->prepare("UPDATE tbl_users SET email = ?, fullName = ?, city = ? WHERE userId = ?");
    $update_query->execute([$email, $fullName, $city, $userId]);

    $message[] = 'Profile updated successfully!';
}

$user_query = $conn->prepare("SELECT * FROM tbl_users WHERE userId = ?");
$user_query->execute([$_SESSION['user_Id']]);
$user = $user_query->fetch(PDO::FETCH_ASSOC);
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>profile update</title>

   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   
   <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
<div class="container">
    
    <form action="profile.php" method="POST">
    <h2>Update Profile</h2>
        <input type="text" name="email"placeholder="EMAIL" value="<?php echo $user['email']; ?>" required><br>
        <input type="text" name="fullName"placeholder="FULLNAME" value="<?php echo $user['fullName']; ?>" required><br>
        <input type="text" name="city"placeholder="CITY" value="<?php echo $user['city']; ?>" required><br>
        <button type="submit" name="update">Update Profile</button>
    </form>
</div>


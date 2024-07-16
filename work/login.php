<?php
session_start();
include ('connectDB.php');

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_EMAIL);
   $password = $_POST['password'];
   $password = filter_var($password, FILTER_SANITIZE_STRING);

   $select_tbl_users = $conn->prepare("SELECT * FROM `tbl_users` WHERE email = ? AND password = ?");
   $select_tbl_users->execute([$email, $password]);
   $row = $select_tbl_users->fetch(PDO::FETCH_ASSOC);

   if($select_tbl_users->rowCount() > 0){
      $_SESSION['user_Id'] = $row['userId'];
      header('location:home.php');
      exit;
   } else {
      $message[] = 'incorrect username or password!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    
    <div class="container">
     <form action="login.php" method="POST">
        <h2> LOGIN </h2>
       
        <input type="text" name="email" placeholder="Email"> <br>

        
        <input type="password" name="password" placeholder="Password"> 

        <div class="rememberme">
        <label>
		<input type="checkbox" name="item" checked/>
		<span class="text-checkbox">Remember me</span>
	    </label>
        </div> <br><br>
        <button type="submit" name="submit">LOGIN </button>
     </form>
    </div>

</body>
</html>

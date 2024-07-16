<?php
   $db_host = 'localhost';
   $db_name = 'secure_member_portal';
   $db_user = 'root';
   $db_password = '';

   $conn = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8",$db_user,$db_password);

?>
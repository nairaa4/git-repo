<!DOCTYPE html>
<html>
    <head>
        <title>Form Login</title>
    </head>

    <body>

 <?php 
 session_start();
 if($_SESSION['status']!="login"){
  header("location:../index.php?pesan=belum_login");
 }
 ?>
    </body>
</html>

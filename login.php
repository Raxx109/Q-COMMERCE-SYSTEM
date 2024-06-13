<?php

include 'config.php';
session_start();

if(isset($_POST['loginn'])){


   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `login` WHERE email = '$email' AND password = '$pass'") or die('query failed');
   $row = mysqli_fetch_assoc($select);

   if(mysqli_num_rows($select) > 0){
      if($pass == $row["password"]){
         $_SESSION["loginn"] = true;
         $_SESSION["userID"] = $row["userID"];
         header("Location: index.php");

      }else{
         $message[] = 'Wrong Password';
      }
}else{
   $message[] = 'Please Sign Up!';
}
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
<div class="form-container">
  
  <form action=" " method="post" enctype="multipart/form-data">
     <h3>login now</h3>
     <?php
     if(isset($message)){
        foreach($message as $message){
           echo '<div class="message">'.$message.'</div>';
        }
     }
     ?>
     <input type="email" name="email" placeholder="Enter Email" class="box" required>
     <input type="password" name="password" placeholder="Enter Password" class="box" required>
     <input type="submit" name="loginn" value="login now" class="btn">
     
  </form>

  <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                  <div class="logo">
                     <h1>AngSarapQ</h1>
                  </div>
                    <a href="register.php"><button class="hidden" id="register">Register now</button></a>
                </div>
            </div>
        </div>

   </div>
</body>
</html>
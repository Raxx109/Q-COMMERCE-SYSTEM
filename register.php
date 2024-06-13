<?php

include 'config.php';

if(isset($_POST['submit'])){

    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobilenum']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

    $select = mysqli_query($conn, "SELECT * FROM `login` WHERE email = '$email' AND password = '$pass'") or die ('query failed');

    if (mysqli_num_rows($select) > 0){
        $message[] = 'User already exist';
    }else{
        if ($pass != $cpass){
            $message[] = 'Confirm password not matched';
        }else{
            $insert = mysqli_query($conn, "INSERT INTO `login`(fname, lname, address, email, mobilenum, password) VALUES ('$fname', '$lname', '$address', '$email', '$mobile', '$pass')") or die ('queary failed');

            if ($insert){
                $message[] = 'registered successfully!';
                header('location:login.php');
            }else{
                $message[] = 'registration failed';
            }
        }
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/5ad3914b72.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>Register Now</h3>
                <?php
                    if (isset($message)){
                        foreach($message as $message){
                            echo '<div class"message">'.$message.'</div>';
                        }
                    }
                ?>
                <input type="text" name="fname" placeholder="First Name" class="box" required>
                <input type="text" name="lname" placeholder="Last Name" class="box" required>
                <input type="text" name="address" placeholder="Complete Address" class="box" required>
                <input type="email" name="email" placeholder="Enter Email" class="box" required>
                <input type="text" name="mobilenum" placeholder="Mobile Number" class="box" required>
                <input type="password" name="password" placeholder="Enter Password" class="box" required>
                <input type="password" name="cpassword" placeholder="Confirm Password" class="box" required>
                <input type="submit" name="submit" value="Register now" class="btn">
                
            </form>

            <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                  <div class="logo">
                     <h1>AngSarapQ</h1>
                  </div>
                    <a href="Login.php"><button class="hidden" id="register">Log in Now</button></a>
                </div>
            </div>
        </div>
                </div>

</body>
</html>
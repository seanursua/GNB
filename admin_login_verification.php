<?php
    include('admin_navbar.php');
    include('admin_login_verification_action.php');
    if(!isset($_SESSION['adminlogin'])){
        header('location:admin_login.php');
    }
    if(isset($_SESSION['adminsuccess'])){
        header('location:admin_home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Login | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="login_verification.css">
</head>
<body>
    <div class="wrapper">
    <form action="admin_login_verification.php" method="post">
         <h2>Verify to Login</h2>
        <?php include('errors.php'); ?>
     	<input type="number" name="otp" placeholder="Enter your One-Time Password" required>
     	<button name="login" type="submit">Login</button>
     </form>
    </div>
</body>
</html>
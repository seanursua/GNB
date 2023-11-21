<?php
    include('navbar.php');
    include('reg_action.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Sign Up | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="registration.css">
</head>
<body>
    <div class="wrapper">
    <form action="registration.php" method="post">
         <h2>SIGN UP</h2>
            <?php include('success.php'); ?>
            <?php include('errors.php'); ?>
            <div class="inputs">
            <input type="text" name="accountnumber" placeholder="Account Number" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password_1" placeholder="Password" required>
            <input type="password" name="password_2" placeholder="Confirm Password" required>
            </div>
            <div class="terms"><a href="terms.php" target="_blank">Show Terms and Condition</a></div>
            <div class="checkbox"><input type="checkbox" name="checkbox" required>
            <p>Please confirm that you agree to our Terms & Conditions</p></div>
     	    <button name="signup" type="submit">Sign Up</button>
             <div class="signin"><p>Already have an Account? <a href="login.php">Sign In Here</a></p></div>
     </form>
    </div>
</body>
</html>
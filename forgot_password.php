<?php
    include('navbar.php');
    include('forgot_password_action.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Forgot Password | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="forgot_password.css">
</head>
<body>
    <div class="wrapper">
    <form action="forgot_password.php" method="post">
         <h2>Forgot Password</h2>
        <?php include('errors.php'); 
              include('success.php');?>
     	<input type="tel" name="accountnumber" placeholder="Enter your Account Number" inputmode="numeric" maxlength="12" required>
     	<button name="send" type="submit">Send</button>
     </form>
    </div>
</body>
</html>
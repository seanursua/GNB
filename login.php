<?php
    include('navbar.php');
    include('login_action.php');
    if(isset($_SESSION['customersuccess'])){
        header('location:depositor_home.php');
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
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div class="wrapper">
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php include('errors.php'); ?>
     	<input type="text" name="username" placeholder="Username" required>
     	<input type="password" name="password" placeholder="Password" required>
        <div class="forgot_pass"><a href="forgot_password.php">Forgot Password?</a></div>
        <button name="login" type="submit">Login</button>
        <div class="signup"><p>Have not an account yet? <a href="registration.php" class="signup">Sign Up</a></div></p>
     </form>
    </div>
</body>
</html>
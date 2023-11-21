<?php
    include('manager_navbar.php');
    include('manager_login_action.php');
    if(isset($_SESSION['managersuccess'])){
        header('location:manager_home.php');
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
    <link rel="stylesheet" type="text/css" href="manager_login.css">
</head>
<body>
    <div class="wrapper">
    <form action="manager_login.php" method="post">
         <h2>MANAGER LOGIN</h2>
        <?php include('errors.php'); ?>
     	<input type="text" name="manager_username" placeholder="Username" required>
     	<input type="password" name="manager_password" placeholder="Password" required>
     	<button name="login" type="submit">Login</button>
     </form>
    </div>
</body>
</html>
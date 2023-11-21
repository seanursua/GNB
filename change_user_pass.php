<?php
    include('change_user_pass_action.php');
    include('idle_time.php');
        if(!isset($_SESSION['valid'])) {
            header('location: login.php');
        }
        if(isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
            header('location: index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Change Password | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="change_user_pass.css">
</head>
<body>
<nav>
    <div class="gnblogo">
        <a href="depositor_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a href="depositor_home.php">HOME</a></li>
        <li><a href="depositors_transactions.php">TRANSACTIONS</a></li>
        <li><a href="bills_payment.php">PAYMENT</a></li>
        <li><a href="transfer_funds.php">TRANSFER</a></li>
        <li><a href="about_us.php">ABOUT</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        <li><a class="active" href="depositor_profile.php">PROFILE</a></li>
        <li><a href="depositor_home.php?logout='1'">LOGOUT</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</nav>
    <div class="wrapper">
    <form action="change_user_pass.php" method="post">
        <h2>Change Password</h2>
        <?php include('success.php');
              include('errors.php');?>
            <input type="password" name="password_old" placeholder="Old Password" required>
            <input type="password" name="password_new" placeholder="New Password" required>
            <input type="password" name="password_confirm" placeholder="Confirm New Password" required>
            <button name="update" type="submit">Update</button>
	</form>
</div>
<script src="app.js"></script>
</body>
</html>
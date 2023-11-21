<?php
    include('transfer_funds_action.php');
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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" type="text/css" href="transfer_funds.css">
    <title>Transfer Funds | Gentlemen's National Bank</title>
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
        <li><a class="active" href="transfer_funds.php">TRANSFER</a></li>
        <li><a href="about_us.php">ABOUT</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        <li><a href="depositor_profile.php">PROFILE</a></li>
        <li><a href="depositor_home.php?logout='1'">LOGOUT</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</nav>
    <div class="wrapper">
        <form action="transfer_funds.php" method="post">
            <h2>Transfer Funds</h2>
            <?php include('errors.php'); ?>
            <?php include('success.php'); ?>
            <input type="tel" name="accountnumber" placeholder="Account Number" inputmode="numeric" maxlength="12" required>
            <input type="number" name="amount" placeholder="Amount" required>
            <input type="password" name="password" placeholder="Password" required>
            <button name="transfer" type="submit">Transfer</button>
        </form>
    </div>
    <script src="app.js"></script>
</body>
</html>
<?php
    session_start();
    include('idle_time.php');
        if(!isset($_SESSION['valid'])) {
            $_SESSION['msg'] = "You must logged in first";
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
    <link rel="stylesheet" type="text/css" href="about_us.css">
    <title>About Us | Gentlemen's National Bank</title>
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
        <li><a class="active" href="about_us.php">ABOUT</a></li>
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
        <div class="content">
            <div class="textbox">
                <h1>ABOUT US</h1>
                <p>Founded in 2021, Gentlemen's National Bank is one of the leading banks that offers banking 
                services that comply with the needs of the Philippine Market. GNB is committed to create 
                customer loyalty, shareholder value, and employee satisfaction.</p>
                
                <h1>MISSION</h1>
                <p> GNB aims to provide advanced and 
                creative banking products and services for all our clients locally through a 
                successful team and using advanced programs, techniques and tools that keep 
                up with the advancements in today’s world.</p>

                <h1>VISION</h1>
                <p>To be a bank that is always the first choice of the clients, a trusted partner for your future.</p>
            </div>
        </div>
    <script src="app.js"></script>
</body>
</html>
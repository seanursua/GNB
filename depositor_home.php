<?php
    session_start();
    include('db_con.php');
    include('idle_time.php');
        if(!isset($_SESSION['valid'])) {
            $_SESSION['msg'] = "You must logged in first";
            header('location: login.php');
        }
        if(isset($_GET['depositorlogout'])) {
            session_destroy();
            unset($_SESSION['customersuccess']); 
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
    <link rel="stylesheet" type="text/css" href="depositor_home.css">
    <title>Home | Gentlemen's National Bank</title>
</head>
<body>
<nav>
    <div class="gnblogo">
        <a href="depositor_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a class="active" href="depositor_home.php">HOME</a></li>
        <li><a href="depositors_transactions.php">TRANSACTIONS</a></li>
        <li><a href="bills_payment.php">PAYMENT</a></li>
        <li><a href="transfer_funds.php">TRANSFER</a></li>
        <li><a href="about_us.php">ABOUT</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        <li><a href="depositor_profile.php">PROFILE</a></li>
        <li><a href="depositor_home.php?depositorlogout='1'">LOGOUT</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</nav>
        <div class="content">
            <div class="textbox">
                <h2>BUILD YOUR <br>FUTURE <br>WITH <span>CLASS</span></h2>
                    
                        <p>Welcome, Mr/Ms. <?php echo $_SESSION['depositorname']; ?>!</p>
                        <?php
                        $username = $_SESSION['customersuccess'];
                        $query = "SELECT accountnumber FROM depositors_account WHERE username = '$username'";
                        $res = mysqli_query($db, $query);
                        $res2 = mysqli_fetch_assoc($res);
                        $sql1 = $res2['accountnumber'];
                        $sql2 = "SELECT transactions FROM bankbook_$sql1 WHERE transaction_date = (SELECT max(transaction_date) FROM bankbook_$sql1)";
                        $result = mysqli_query($db, $sql2);
                            if ($result->num_rows > 0) { 
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <h3>Recent Transaction: <?php echo $row['transactions'];?></h3>
                        <?php }}?>
                        
            </div>
            <div class="gnb">
            <img src="images/GNBLOGO1.png" alt="GNBLogo">
            </div>
    </div>
<script src="app.js"></script>
</body>
</html>
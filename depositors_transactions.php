<?php
    session_start();
    include('db_con.php');
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
    <title>My Transactions | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="depositors_transactions.css">
</head>
<body>
<nav>
    <div class="gnblogo">
    <a href="depositor_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a href="depositor_home.php">HOME</a></li>
        <li><a class="active" href="depositors_transactions.php">TRANSACTIONS</a></li>
        <li><a href="bills_payment.php">PAYMENT</a></li>
        <li><a href="transfer_funds.php">TRANSFER</a></li>
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
    <form action="depositors_transactions.php" method="post">
        <?php
            $username = $_SESSION['customersuccess'];
            $query = "SELECT accountnumber FROM depositors_account WHERE username = '$username'";
            $res = mysqli_query($db, $query);
            $res2 = mysqli_fetch_assoc($res);
            $sql1 = $res2['accountnumber'];
            $sql2 = "SELECT * FROM bankbook_$sql1";
            $result = mysqli_query($db, $sql2);
                    if ($result && $result->num_rows > 0) { ?>
                        <table id="tbl_depositors">
                
                <tr>
                    <th>Account Number</th>
                    <th>Username</th>
                    <th>Transaction Date</th>
                    <th>Transactions</th>
                    <th>Withdrawal/Debit</th>
                    <th>Deposit/Credit</th>
                    <th>Balance</th>
                </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $row['acc_num']; ?></td>
                    <td><?php echo $row['usern']; ?></td>
                    <td><?php echo $row['transaction_date']; ?></td>
                    <td><?php echo $row['transactions']; ?></td>
                    <td><?php echo $row['withdrawal']; ?></td>
                    <td><?php echo $row['deposit']; ?></td>
                    <td><?php echo $row['balance']; ?></td>
                </tr>
                <?php
                }
                ?>
                </table>
                <?php
                }
                ?> 
	</form>
</div>
<script src="app.js"></script>
</body>
</html>
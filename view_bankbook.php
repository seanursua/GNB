<?php
    session_start();
    include('db_con.php');
    include('idle_time.php');
    if(!isset($_SESSION['managervalid'])) {
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
    <title>Manage Depositors | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="manage_depositors.css">
</head>
<body>
<nav>
    <div class="gnblogo">
      <a href="manager_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a href="manager_home.php">HOME</a></li>
        <li><a href="add_depositors.php">ADD DEPOSITORS</a></li>
        <li><a class="active" href="manage_depositors.php">MANAGER DEPOSITORS</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
</nav>
    <div class="wrapper">
    <form action="view_bankbook.php" method="post">
        <?php
            if (isset($_GET['id'])) {
                $_SESSION['id'] = $_GET['id'];
            }
            $sql = "SELECT accountnumber FROM depositors_account WHERE id=".$_SESSION['id'];
            $result = mysqli_query($db, $sql);
            $res2 = mysqli_fetch_assoc($result);
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
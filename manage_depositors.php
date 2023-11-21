<?php
    include('db_con.php');
    include('manager_login_action.php');
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
    <form action="manage_depositors.php" method="post">
        <?php
            $sql = "SELECT id, firstname, lastname, accountnumber, phonenumber FROM depositors_account";
            $result = mysqli_query($db, $sql);
                    if ($result->num_rows > 0){ ?>
                        <table id="tbl_depositors">
                
                <tr>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last Name</th>
                    <th>Account Number</th>
                    <th>Contact</th>
                    <th>Transaction</th>
                </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['accountnumber']; ?></td>
                    <td><?php echo $row['phonenumber']; ?></td>
                    <td><a href="add_funds.php?id=<?php echo $row['id']?>">Add Funds</a><br><a href="view_bankbook.php?id=<?php echo $row['id']?>">View Transactions</a></td>
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
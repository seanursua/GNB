<?php
    session_start();
    include('idle_time.php');
        if(!isset($_SESSION['managervalid'])) {
            header('location: index.php');
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
    <link rel="stylesheet" type="text/css" href="manager_home.css">
    <title>Manager Home | Gentlemen's National Bank</title>
</head>
<body>
<nav>
    <div class="gnblogo">
        <a href="manager_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a href="manager_home.php">HOME</a></li>
        <li><a href="add_depositors.php">ADD DEPOSITORS</a></li>
        <li><a href="manage_depositors.php">MANAGER DEPOSITORS</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
</nav>
        <div class="content">
            <div class="textbox">
                <h2>BUILD YOUR <br>FUTURE<br> WITH <span>CLASS </span></h2>
                <p>Welcome, Mr/Ms. <?php echo $_SESSION['managername']; ?>!</p>
                    <a href="manager_home.php?logout='1'">Logout</a>
            </div>
            <div class="gnb">
            <img src="images/GNBLOGO1.png" alt="GNBLogo">
            </div>
    </div>
<script src="app.js"></script>
</body>
</html>
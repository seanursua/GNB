<?php
    session_start();
    include('idle_time.php');
        if(!isset($_SESSION['adminvalid'])) {
            header('location: index.php');
        }
        if(isset($_GET['adminlogout'])) {
            session_destroy();
            unset($_SESSION['adminsuccess']);
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
    <link rel="stylesheet" type="text/css" href="admin_home.css">
    <title>Admin Home | Gentlemen's National Bank</title>
</head>
<body>
<nav>
    <div class="gnblogo">
    <a href="admin_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
        <ul class="nav-links">
            <li><a href="add_managers.php">ADD MANAGER</a></li>
            <li><a href="manage_managers.php">EDIT MANAGER</a></li>
            <li><a href="admin_manage_depositors.php">EDIT DEPOSITOR</a></li>
            <li><a href="admin_logfiles.php">ADMIN LOGFILES</a></li>
            <li><a href="manager_logfiles.php">MANAGER LOGFILES</a></li>
            <li><a href="depositor_logfiles.php">DEPOSITOR LOGFILES</a></li>
        </ul>
        <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
</nav>
    <div class="content">
        <div class="textbox">
            <h2>BUILD YOUR <br>FUTURE<br> WITH <span>CLASS </span></h2>
            <p>Welcome, Admin!</p>
            <a href="admin_home.php?adminlogout='1'">Logout</a>
        </div>
    <div class="gnb">
        <img src="images/GNBLOGO1.png" alt="GNBLogo">
    </div>
</div>
<script src="app.js"></script>
</body>
</html>
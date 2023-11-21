<?php
    include('add_managers_action.php');
    if(!isset($_SESSION['adminvalid'])) {
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
    <title>Add Managers | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="add_managers.css">
</head>
<body>
<nav>
    <div class="gnblogo">
    <a href="admin_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
        <ul class="nav-links">
            <li><a class="active" href="add_managers.php">ADD MANAGER</a></li>
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
    <div class="wrapper">
    <form action="add_managers.php" method="post">
         <h2>Add Manager</h2>
            <?php include('errors.php'); ?>
            <?php include('success.php'); ?>
            <input type="text" name="manager_name" placeholder="Full Name" required>
            <input type="number" name="manager_contact" placeholder="Contact" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" required>
            <input type="email" name="manager_email" placeholder="Email" required>
            <input type="text" name="manager_username" placeholder="Username" required>
            <input type="password" name="manager_password_1" placeholder="Password" required>
            <input type="password" name="manager_password_2" placeholder="Confirm Password" required>
     	<button name="add_manager" type="submit">Add Manager</button>
     </form>
    </div>
    <script src="app.js"></script>
</body>
</html>
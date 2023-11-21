<?php
    session_start();
    include('db_con.php');
    include('idle_time.php');
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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Manager Log Files | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="manager_logfiles.css">
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
            <li><a class="active" href="manager_logfiles.php">MANAGER LOGFILES</a></li>
            <li><a href="depositor_logfiles.php">DEPOSITOR LOGFILES</a></li>
        </ul>
        <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
</nav>
<div class="wrapper">
    <form action="logfiles.php" method="post">
        <?php
                $query_manager = "SELECT manager_user, action, date FROM manager_logfile";
                $result = mysqli_query($db, $query_manager);
                    if ($result->num_rows > 0){ ?>
                        <table id="logfiles_manager">
                
                <tr>
                    <th>Username</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
                <?php
                while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $row['manager_user']; ?></td>
                    <td><?php echo $row['action']; ?></td>
                    <td><?php echo $row['date']; ?></td>
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
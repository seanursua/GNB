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
    <title>Sign Up | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="manage_managers.css">
</head>
<body>
<nav>
    <div class="gnblogo">
    <a href="admin_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
        <ul class="nav-links">
            <li><a href="add_managers.php">ADD MANAGER</a></li>
            <li><a class="active" href="manage_managers.php">EDIT MANAGER</a></li>
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
    <form action="manage_depositors.php" method="post">
        <?php
            $sql = "SELECT id, manager_name, manager_contact, manager_username FROM manager_account";
            $result = mysqli_query($db, $sql);
                    if ($result->num_rows > 0){ ?>
                        <table id="tbl_managers">
                
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Contact Number</th>
                    <th>Username</th>
                    <th>Manage</th>
                </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['manager_name']; ?></td>
                    <td><?php echo $row['manager_contact']; ?></td>
                    <td><?php echo $row['manager_username']; ?></td>
                    <td><a href="edit_managers.php?id=<?php echo $row['id']?>">Edit Information</a></td>
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
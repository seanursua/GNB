<?php
    include('idle_time.php');
    include('edit_managers_action.php');
        if(!isset($_SESSION['adminvalid'])) {
            header('location: index.php');
        }
        if (isset($_GET['id'])) {
            $_SESSION['id'] = $_GET['id'];
        }
            $sql = "SELECT id, manager_name, manager_contact, manager_email,
            manager_username, manager_password FROM manager_account WHERE id=".$_SESSION['id'];
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0){
                        while($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $manager_name = $row['manager_name'];
                            $manager_contact = $row['manager_contact'];
                            $manager_email= $row['manager_email'];
                            $manager_username = $row['manager_username'];
                        }
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
    <title>Edit Manager | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="edit_managers.css">
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
<form action="edit_managers.php" method="post">
	<h2>Edit Manager Information</h2>
        <?php include('success.php');
              include('errors.php'); ?>
            <input name="id" type="number" placeholder="ID" value="<?php echo $id ?>" readonly required>
                <input name="name" type="text" placeholder="Full Name" value="<?php echo $manager_name ?>" required>
                    <input name="contact" type="number" placeholder="Contact"value="<?php echo $manager_contact ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" required>
                <input name="email" type="email" placeholder="Email Address" value="<?php echo $manager_email ?>" required>
            <input name="username" type="text" placeholder="Username" value="<?php echo $manager_username ?>" required>
    <button type="submit" name="update">Edit Information</button>
</form>
</div>
<script src="app.js"></script>
</body>
</html>
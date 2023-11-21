<?php
    session_start();
    include('db_con.php');
    // include('idle_time.php');
        if(!isset($_SESSION['valid'])) {
            header('location: login.php');
        }
        if(isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['username']);
            header('location: index.php');
        }
        $usern = $_SESSION['customersuccess'];
            $sql = "SELECT firstname, middlename, lastname, gender, birthdate, 
            birthplace, email, phonenumber, address, civil_status, accountnumber,
            username, password FROM depositors_account WHERE username='$usern'";
                $result = mysqli_query($db, $sql);
                if ($result->num_rows > 0){
                        while($row = mysqli_fetch_assoc($result)) { 
                            $firstname = $row['firstname'];
                            $middlename = $row['middlename'];
                            $lastname = $row['lastname'];
                            $gender = $row['gender'];
                            $birthdate = $row['birthdate'];
                            $birthplace = $row['birthplace'];
                            $email = $row['email'];
                            $phonenumber = $row['phonenumber'];
                            $address = $row['address'];
                            $civil_status = $row['civil_status'];
                            $accountnumber = $row['accountnumber'];
                            $username = $row['username'];
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
    <title>My Profile | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="depositor_profile.css">
</head>
<body>
<nav>
    <div class="gnblogo">
        <a href="depositor_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a href="depositor_home.php">HOME</a></li>
        <li><a href="depositors_transactions.php">TRANSACTIONS</a></li>
        <li><a href="bills_payment.php">PAYMENT</a></li>
        <li><a href="transfer_funds.php">TRANSFER</a></li>
        <li><a href="about_us.php">ABOUT</a></li>
        <li><a href="contact.php">CONTACT</a></li>
        <li><a class="active" href="depositor_profile.php">PROFILE</a></li>
        <li><a href="depositor_home.php?logout='1'">LOGOUT</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</nav>
    <div class="wrapper">
    <form action="depositor_profile.php" method="post">
        <label for="firstname">First Name: <?php echo $firstname ?></label>
        <label for="middlename">Middle Name: <?php echo $middlename ?></label>
        <label for="lastname">Last Name: <?php echo $lastname ?></label>
        <label for="gender">Gender: <?php echo $gender ?></label>
        <label for="birthdate">Birthdate: <?php echo $birthdate ?></label>
        <label for="birthplace">Birthplace: <?php echo $birthplace ?></label>
        <label for="birthplace">Email: <?php echo $email ?></label>
        <label for="phonenumber">Contact Number: <?php echo $phonenumber ?></label>
        <label for="address">Address: <?php echo $address ?></label>
        <label for="civil_status">Civil Status: <?php echo $civil_status ?></label>
        <label for="accountnumber">Account Number: <?php echo $accountnumber ?></label>
        <label for="username">Username: <?php echo $username ?></label>
        <a class="change-user-pass" href="change_user_pass.php">Change Username & Password</a>
	</form>
</div>
<script src="app.js"></script>
</body>
</html>
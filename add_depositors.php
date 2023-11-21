<?php
    include('add_depositors_action.php');
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
    <title>Sign Up | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="add_depositors.css">
</head>
<body>
<nav>
    <div class="gnblogo">
        <a href="manager_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a href="manager_home.php">HOME</a></li>
        <li><a class="active" href="add_depositors.php">ADD DEPOSITORS</a></li>
        <li><a href="manage_depositors.php">MANAGER DEPOSITORS</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
</nav>
    <div class="wrapper">
    <form action="add_depositors.php" method="post">
		<h2>Add Depositor</h2>
        <?php include('errors.php'); ?>
        <?php include('success.php'); ?>
            <input name="firstname" type="text" placeholder="First Name" required>
                <input name="middlename" type="text" placeholder="Middle Name" required>
                    <input name="lastname" type="text" placeholder="Last Name" required>
                            <select name="gender" id="gender">
                                    <option value="">-Select Gender-</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                            </select>
                        <input name="birthdate" type="date" placeholder="Birthdate" required>
                            <input name="birthplace" type="text" placeholder="Birthplace" required>
                                <input name="email" type="email" placeholder="Email" required>
                                    <input name="phonenumber" type="number" placeholder="Enter your Phone Number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;" required>
                                    <input name="address" type="text" placeholder="Complete Address" required>
                        <select name="civil_status" id="civil_status">
                                <option value="">-Select Marital Status-</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                                <option value="Divorced">Divorced</option>
                        </select>
                <input name="openingbalance" type="number" placeholder="Opening Balance" required>
        <button type="submit" name="add">Add Depositor</button>
	</form>
</div>
<script src="app.js"></script>
</body>
</html>
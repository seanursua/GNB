<?php
    include('idle_time.php');
    include('edit_depositors_action.php');
        if(!isset($_SESSION['adminvalid'])) {
            header('location: index.php');
        }
        if (isset($_GET['id'])) {
            $_SESSION['id'] = $_GET['id'];
        }
            $sql = "SELECT firstname, middlename, lastname, gender, birthdate, 
            birthplace, email, phonenumber, address, civil_status, accountnumber
            FROM depositors_account WHERE id=".$_SESSION['id'];
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
    <title>Edit Information | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="edit_depositors.css">
</head>
<body>
<nav>
    <div class="gnblogo">
    <a href="admin_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
        <ul class="nav-links">
            <li><a href="add_managers.php">ADD MANAGER</a></li>
            <li><a href="manage_managers.php">EDIT MANAGER</a></li>
            <li><a class="active" href="admin_manage_depositors.php">EDIT DEPOSITOR</a></li>
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
    <form action="edit_depositors.php" method="post">

		<h2>Edit Information</h2>
        <?php include('success.php');
              include('errors.php'); ?>
            <input name="firstname" type="text" placeholder="First Name" value="<?php echo $firstname ?>" required>
                <input name="middlename" type="text" placeholder="Middle Name" value="<?php echo $middlename ?>" required>
                    <input name="lastname" type="text" placeholder="Last Name" value="<?php echo $lastname ?>" required>
                            <select name="gender" id="gender">
                                    <option value="<?php echo $gender ?>"><?php echo $gender ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                            </select>
                        <input name="birthdate" type="date" placeholder="Birthdate" value="<?php echo $birthdate ?>" required>
                        <input name="birthplace" type="text" placeholder="Birthplace" value="<?php echo $birthplace ?>" required>
                        <input name="email" type="email" placeholder="Email" value="<?php echo $email ?>" required>
                        <input name="phonenumber" type="number" placeholder="Enter your Phone Number"value="<?php echo $phonenumber ?>" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;" required>
                        <input name="address" type="text" placeholder="Complete Address" value="<?php echo $address ?>" required>
                        <select name="civil_status" id="civil_status">
                                <option value="<?php echo $civil_status ?>"><?php echo $civil_status ?></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Separated">Separated</option>
                                <option value="Divorced">Divorced</option>
                        </select>
                    <input name="accountnumber" type="text" value="<?php echo $accountnumber ?>" readonly required>
        <button type="submit" name="add">Edit Information</button>
	</form>
</div>
<script src="app.js"></script>
</body>
</html>
<?php
include('db_con.php');
include('admin_login_action.php');
$firstname = "";
$middlename = "";
$lastname = "";
$gender = "";
$birthdate = "";
$birthplace = "";
$email = "";
$phonenum = "";
$address = "";
$civil_status = "";
$accountnumber = "";
$errors = array();
$success = array();
$admin_username = $_SESSION['adminsuccess'];

	if(isset($_POST['add'])) {
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $birthplace = $_POST['birthplace'];
		$email = $_POST['email'];
        $phonenum = $_POST['phonenumber'];
        $address = $_POST['address'];
        $civil_status = $_POST['civil_status'];
        $accountnumber = $_POST['accountnumber'];

        $query_check_account = "SELECT * FROM depositors_account WHERE accountnumber <> '$accountnumber'";
        $check_account_res = mysqli_query($db, $query_check_account);
        $check_account_result = mysqli_fetch_assoc($check_account_res);
        $depositor_email = $check_account_result['email'];
        $depositor_num = $check_account_result['phonenumber'];

            if($depositor_email === $email) {
                array_push($errors, "Email already has an existing Account");
            }
            else if ($depositor_num === $phonenum) {
                array_push($errors, "Phone Number already has an existing Account");
            }
            else {
                $query = "UPDATE depositors_account SET firstname = '$firstname', middlename = '$middlename', 
                lastname = '$lastname', gender = '$gender', birthdate = '$birthdate', birthplace = '$birthplace', 
                email = '$email', phonenumber = '$phonenum', address = '$address', civil_status = '$civil_status'
                WHERE accountnumber = '$accountnumber'";
                        mysqli_query($db, $query);
                        array_push($success, "Updated Successfully");
                        
                        $query_logfile = "INSERT INTO admin_logfile (admin_user, action, date)
                        VALUES ('$admin_username', 'Edited information of Client $accountnumber', NOW())";
                                mysqli_query($db, $query_logfile);
            }

    }
?>
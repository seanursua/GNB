<?php
session_start();
include('db_con.php');
$password_old = "";
$password = "";
$password_confirm = "";
$errors = array();
$success = array();
$usern = $_SESSION['customersuccess'];

	if(isset($_POST['update'])) {
        $password_old = $_POST['password_old'];
		$password = $_POST['password_new'];
        $password_confirm = $_POST['password_confirm'];
        
            if($password !== $password_confirm) {
                array_push($errors, "Password does not match!");
            }
            else {
                $password_old = md5($password_old);
                $query_check_pass = "SELECT * FROM depositors_account WHERE username = '$usern' 
                AND password ='$password_old' LIMIT 1";
                $query_res = mysqli_query($db, $query_check_pass);
                if (mysqli_num_rows($query_res) > 0) {
                    $query_result = mysqli_fetch_assoc($query_res);
                    $accountnumber = $query_result['accountnumber'];
                    $password = md5($password);
                    $query_update = "UPDATE depositors_account SET password = '$password' WHERE username = '$usern'";
                            mysqli_query($db, $query_update);
                            array_push($success, "Updated Successfully");

                            $query_logfile = "INSERT INTO customer_logfile (username, accountnumber, action, date)
                            VALUES ('$usern', '$accountnumber', 'Changed Password', NOW())";
                                mysqli_query($db, $query_logfile);
                }
                else {
                    array_push($errors, "Incorrect Old Password");
                }
            }
    }
?>
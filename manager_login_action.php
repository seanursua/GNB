<?php
session_start(); 
include ('db_con.php');
$username = "";
$password = "";
$otp = rand(9999999, 1111111);
$errors = array();
        if (isset($_POST['login'])) {
            $username = $_POST['manager_username'];
            $password= $_POST['manager_password'];

        
        //checks the database for existing users
        $password = md5($password);
		$manager_check_query = "SELECT * FROM manager_account WHERE manager_username = '$username' AND manager_password = '$password' LIMIT 1";
            $result = mysqli_query($db, $manager_check_query);
                if (($result->num_rows) > 0) {

                    $manager_email_query = "SELECT manager_email FROM manager_account WHERE manager_username = '$username'";
                    $manager_email_result = mysqli_query($db, $manager_email_query);
                    $email_result = mysqli_fetch_assoc($manager_email_result);
                    $manager_email = $email_result['manager_email'];
                        
                        $manager_otp_query = "UPDATE manager_account SET otp = '$otp' WHERE manager_username = '$username'";
                        mysqli_query($db, $manager_otp_query);

                        $email = $manager_email;
                        $subject = "Manager One-Time Password";
                        $message = "Hello, Manager $username,\n\nThis is your OTP for you to login.\n\n\n$otp";
                        $sender = "From: gnbphilippines@gmail.com";
                        mail($email, $subject, $message, $sender);

                        $_SESSION['managerlogin'] = true;
                        header('location: manager_login_verification.php');

                }
                else {
                    array_push($errors, "Incorrect Username or Password");
                }  
                   
        }
?>
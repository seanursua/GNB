<?php
session_start(); 
include ('db_con.php');
$username = "";
$password = "";
$otp = rand(9999999, 1111111);
$errors = array();
        if (isset($_POST['login'])) {
            $username = $_POST['admin_username'];
            $password= $_POST['admin_password'];

        
        //checks the database for existing users
		$admin_check_query = "SELECT * FROM admin_account WHERE admin_username = '$username' LIMIT 1";
            $result = mysqli_query($db, $admin_check_query);
                if (($result->num_rows) > 0) {
                        $admin_email_query = "SELECT admin_email FROM admin_account WHERE admin_username = '$username'";
                        $admin_email_result = mysqli_query($db, $admin_email_query);
                        $email_result = mysqli_fetch_assoc($admin_email_result);
                        $admin_email = $email_result['admin_email'];
                            
                            $admin_otp_query = "UPDATE admin_account SET otp = '$otp' WHERE admin_username = '$username'";
                            mysqli_query($db, $admin_otp_query);

                            $email = $admin_email;
                            $subject = "Admin One-Time Password";
                            $message = "Hello, Admin $username,\n\nThis is your OTP for you to login.\n\n\n$otp";
                            $sender = "From: gnbphilippines@gmail.com";
                            mail($email, $subject, $message, $sender);

                            $_SESSION['adminlogin'] = true;
                            header('location: admin_login_verification.php');
                }
                else {
                    array_push($errors, "Incorrect Username or Password");
                }  
                   
        }
?>
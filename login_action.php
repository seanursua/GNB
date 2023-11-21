<?php
session_start(); 
include ('db_con.php');
$username = "";
$password = "";
$otp = rand(999999, 111111);
$errors = array();
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password= $_POST['password'];

        
        //checks the database for existing users
        $password = md5($password);
		$user_check_query = "SELECT * FROM depositors_account WHERE username = '$username' AND 
        password = '$password' LIMIT 1";
            $results = mysqli_query($db, $user_check_query);
                if (($results->num_rows) > 0) {

                $user_email_query = "SELECT email FROM depositors_account WHERE username = '$username'";
                    $user_email_result = mysqli_query($db, $user_email_query);
                        $email_result = mysqli_fetch_assoc($user_email_result);
                            $user_email = $email_result['email'];

                $user_otp_query = "UPDATE depositors_account SET otp = '$otp' WHERE username = '$username'";
                    mysqli_query($db, $user_otp_query);

                $email = $user_email;
                $subject = "One-Time Password";
                $message = "Hello, Mr/Ms $username,\n\nThis is your OTP for you to login.\n\n\n$otp";
                $sender = "From: gnbphilippines@gmail.com";
                mail($email, $subject, $message, $sender);
                $_SESSION['depositorlogin'] = true;
                header('location: login_verification.php');
                }

                else {
                    array_push($errors, "Incorrect Username or Password");
                }  
        }
?>
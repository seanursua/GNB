<?php
session_start(); 
include ('db_con.php');
$accountnumber = "";
$password = rand(999999, 111111);
$success = array();
$errors = array();
        if (isset($_POST['send'])) {
            $accountnumber = $_POST['accountnumber'];

            $query_check = "SELECT * FROM depositors_account WHERE accountnumber = '$accountnumber' LIMIT 1";
            $query_check_res = mysqli_query($db, $query_check);
            $query_check_result = mysqli_fetch_assoc($query_check_res);
            $user_name = $query_check_result['username'];

            if (empty($user_name)) {
                array_push($errors, "Online Account doesn't exist");
            }
            else {
            $password_new = md5($password);
            $query_new_password = "UPDATE depositors_account SET password = '$password_new' WHERE
            accountnumber ='$accountnumber'";
                mysqli_query($db, $query_new_password);

                $query_email = "SELECT * FROM depositors_account WHERE accountnumber = '$accountnumber' LIMIT 1";
                $query_email_res = mysqli_query($db, $query_email);
                if (mysqli_num_rows($query_email_res) > 0) {
                    $email_result = mysqli_fetch_assoc($query_email_res);
                    $user_email = $email_result['email'];
                    $user_surname = $email_result['lastname'];
                        $email = $user_email;
                        $subject = "Requested New Password";
                        $message = "Hello, Mr./Ms. $user_surname,
                        \n\nThis is your New Password for you to login.
                        \n$password
                        \n\nYou can change this eventually on your Profile. Thank you!";
                        $sender = "From: gnbphilippines@gmail.com";
                        mail($email, $subject, $message, $sender);
                        
                        $_SESSION['forgot_password_successful'] = true;
                            header('location: forgot_password_successful.php');
                }
                else {
                    array_push($errors, "Account Number doesn't Exist");
                }
            }
        }
?>

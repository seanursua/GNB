<?php
    session_start();
    include('db_con.php');
    $manager_name = "";
    $manager_contact = "";
    $manager_username = "";
    $manager_password_1 = "";
    $manager_password_2 = "";
    $success = array();
    $errors = array();
    $username = $_SESSION['adminsuccess'];
        if (isset($_POST['add_manager'])) {
            $manager_name = $_POST['manager_name'];
            $manager_contact = $_POST['manager_contact'];
            $manager_email = $_POST['manager_email'];
            $manager_username = $_POST['manager_username'];
            $manager_password_1 = $_POST['manager_password_1'];
            $manager_password_2 = $_POST['manager_password_2'];
        
            if (!filter_var($manager_email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid Email Address");
            }
            else {
            $manager_check_query = "SELECT * FROM manager_account WHERE manager_username = '$manager_username' OR manager_contact = '$manager_contact' LIMIT 1";
            $results = mysqli_query($db, $manager_check_query);
            if (mysqli_num_rows($results) > 0) {
            $user = mysqli_fetch_assoc($results);
            $manager_usern = $user['manager_username'];
            $manager_cont = $user['manager_contact'];
            $manager_email_add = $user['manager_email'];
                    if($manager_usern === $manager_username) {
                        array_push($errors, "Username already has a registered account");
                    }
                    if($manager_cont === $manager_contact) {
                        array_push($errors, "Contact Number already has a registered account");
                    }
                    if($manager_email_add === $manager_email) {
                        array_push($errors, "Email Address already has a registered account");
                    }
                    if($manager_password_1 !== $manager_password_2) {
                        array_push($errors, "Password does not match");
                    }
                    
            }
            else {
                    $password = md5($manager_password_1);
                    $query = "INSERT INTO manager_account (manager_name, manager_contact, manager_email, manager_username, manager_password)
                    VALUES ('$manager_name', '$manager_contact', '$manager_email', '$manager_username', '$password')";
                            mysqli_query($db, $query);
                            array_push($success, "Manager Added Successfully");
                            $date = date("Y-m-d H:i:s");
                            $email_address = $manager_email;
                            $subject = "Manager Account Credentials";
                            $message = "Hello, Manager Mr/Ms. $manager_name!
                            \n\nThese are your Account Credentials;
                            \n\nUsername: $manager_username
                            \nPassword: $manager_password_1
                            \nDate of Creation: $date";
                            $sender = "From: gnbphilippines@gmail.com";
                            mail($email_address, $subject, $message, $sender);

                            $query_logfile = "INSERT INTO admin_logfile (admin_user, action, date)
                            VALUES ('$username', 'Added a New Manager', NOW())";
                                mysqli_query($db, $query_logfile);
                }
            }
        }
?>
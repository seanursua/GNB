<?php
session_start(); 
include ('db_con.php');
$password = "";
$errors = array();
        if (isset($_POST['login'])) {
            $password = $_POST['otp'];
        //fetch the user who logged in
            $username_query = "SELECT * FROM admin_account WHERE otp = '$password' LIMIT 1";
            $usern_res = mysqli_query($db, $username_query);
            if (mysqli_num_rows($usern_res) > 0) {
                $usern_result = mysqli_fetch_assoc($usern_res);
                $username = $usern_result['admin_username'];
                $_SESSION['adminvalid'] = true;
                $_SESSION['adminsuccess'] = $username;
                header('location: admin_home.php');

                    $query_logfile = "INSERT INTO admin_logfile (admin_user, action, date)
                    VALUES ('$username', 'Logged in', NOW())";
                        mysqli_query($db, $query_logfile);
            }
            else {
                array_push($errors, "Incorrect One-Time password");
            }  
        }
?>

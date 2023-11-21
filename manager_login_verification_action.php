<?php
session_start(); 
include ('db_con.php');
$password = "";
$errors = array();
        if (isset($_POST['login'])) {
            $password = $_POST['otp'];
        //fetch the user who logged in
            $username_query = "SELECT * FROM manager_account WHERE otp = '$password' LIMIT 1";
            $usern_res = mysqli_query($db, $username_query);
            if (mysqli_num_rows($usern_res) > 0) {
                $usern_result = mysqli_fetch_assoc($usern_res);
                $name = $usern_result['manager_name'];
                $username = $usern_result['manager_username'];
                $_SESSION['managervalid'] = true;
                $_SESSION['managersuccess'] = $username;
                $_SESSION['managername'] = $name;
                header('location: manager_home.php');

                    $query_logfile = "INSERT INTO manager_logfile (manager_user, action, date)
                    VALUES ('$username', 'Logged in', NOW())";
                        mysqli_query($db, $query_logfile);
            }
            else {
                array_push($errors, "Incorrect One-Time password");
            }  
        }
?>



<?php
session_start(); 
include ('db_con.php');
$password = "";
$errors = array();
        if (isset($_POST['login'])) {
            $password = $_POST['otp'];
        //fetch the user who logged in
            $username_query = "SELECT * FROM depositors_account WHERE otp = '$password' LIMIT 1";
            $usern_res = mysqli_query($db, $username_query);
            if (mysqli_num_rows($usern_res) > 0) {
                $usern_result = mysqli_fetch_assoc($usern_res);
                $username = $usern_result['username'];
                $accountnumber = $usern_result['accountnumber'];
                $fname = $usern_result['firstname'];
                $lname = $usern_result['lastname'];
                $_SESSION['valid'] = true;
                $_SESSION['customersuccess'] = $username;
                $_SESSION['depositorname'] = $fname . " " . $lname;
                header('location: depositor_home.php');

                    $query_logfile = "INSERT INTO customer_logfile (username, accountnumber, action, date)
                    VALUES ('$username', '$accountnumber', 'Logged in', NOW())";
                        mysqli_query($db, $query_logfile);
            }
            else {
                array_push($errors, "Incorrect One-Time password");
            }  
        }
?>

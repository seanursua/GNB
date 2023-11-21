<?php
    session_start();
    include('db_con.php');
    $accountnumber = "";
    $username = "";
    $success = array();
    $errors = array();
    // $user_name = "None";
        if (isset($_POST['signup'])) {
            $accountnumber = $_POST['accountnumber'];
            $username = $_POST['username'];
            $password_1 = $_POST['password_1'];
            $password_2 = $_POST['password_2'];

            
            if($password_1 !== $password_2) {
                array_push($errors, "Password does not match");
            }
            else {
                $user_check_query = "SELECT * FROM depositors_account WHERE accountnumber = '$accountnumber' OR username = '$username' LIMIT 1";
                $results = mysqli_query($db, $user_check_query);
                if (mysqli_num_rows($results) > 0) {
                        $row = mysqli_fetch_assoc($results);
                            $user_name = $row['username'];
                            $user_accnum = $row['accountnumber'];
                                if($user_name === $username) {
                                    array_push($errors, "Username already has a registered account");
                                }
                                else if (empty($user_name)) {
                                    $password = md5($password_1);
                                    $query = "UPDATE depositors_account SET username = '$username', password = '$password'
                                    WHERE accountnumber = '$accountnumber' AND username = '' AND password = ''";
                                        $query2 = "UPDATE bankbook_".$accountnumber." SET usern = '$username'
                                        WHERE acc_num = '$accountnumber'";
                                                mysqli_query($db, $query);
                                                mysqli_query($db, $query2);
                                                array_push($success, "Online Account created successfully");
                                    }
                                    else {
                                        array_push($errors, "Account number already has a registered account");
                                    }
                }
                else {
                    array_push($errors, "Account number doesn't exist");
                }
            }               
        }
?>
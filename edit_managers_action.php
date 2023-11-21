<?php
session_start();
include('db_con.php');
$name = "";
$contact = "";
$email = "";
$username = "";
$success = array();
$errors = array();
$admin_username = $_SESSION['adminsuccess'];

	if(isset($_POST['update'])) {
        $id = $_POST['id'];
		$name = $_POST['name'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $username = $_POST['username'];

            $query_check_account = "SELECT * FROM manager_account WHERE id <> '$id'";
            $check_account_res = mysqli_query($db, $query_check_account);
            $check_account_result = mysqli_fetch_assoc($check_account_res);
            $manager_email = $check_account_result['manager_email'];
                $manager_contact = $check_account_result['manager_contact'];
                    $manager_username = $check_account_result['manager_username'];
                        if($manager_email === $email) {
                            array_push($errors, "Email Already Exist");
                        }
                        else if ($manager_contact === $contact) {
                            array_push($errors, "Phone Number Already Exist");
                        }
                        else if ($manager_username === $username) {
                            array_push($errors, "Username Already Exist");
                        }
                        else {
                        $query_update = "UPDATE manager_account 
                                        SET manager_name = '$name', 
                                        manager_contact = '$contact', 
                                        manager_email = '$email', 
                                        manager_username = '$username' 
                                        WHERE id = '$id'";

                                mysqli_query($db, $query_update);
                                array_push($success, "Updated Successfully");
                                
                                $query_logfile = "INSERT INTO admin_logfile (admin_user, action, date)
                                                VALUES ('$admin_username', 'Edited information of Manager $username', NOW())";
                                        mysqli_query($db, $query_logfile);
                        }
    }
?>
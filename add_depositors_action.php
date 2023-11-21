<?php
session_start(); 
include ('db_con.php');
$firstname = "";
$middlename = "";
$lastname = "";
$gender = "";
$birthdate = "";
$birthplace = "";
$email = "";
$phonenum = "";
$address = "";
$civil_status = "";
$accountnumber = rand(1000000000,9999999999);
$openingbalance = "";
$limit = 150000;
$invalid_amount = 0;
$success = array();
$errors = array();
$username = $_SESSION['managersuccess'];
	if(isset($_POST['add'])) {
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $birthdate = $_POST['birthdate'];
        $birthplace = $_POST['birthplace'];
		$email = $_POST['email'];
        $phonenum = $_POST['phonenumber'];
        $address = $_POST['address'];
        $civil_status = $_POST['civil_status'];
        $openingbalance = $_POST['openingbalance'];

            $accountnumber = "00$accountnumber";
                
            if ($openingbalance > $limit) {
                array_push($errors, "You have reached the maximum limit of Opening Balance");
            }
            if ($openingbalance <= $invalid_amount) {
                array_push($errors, "Invalid Amount");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($errors, "Invalid Email Address");
            }
        //checks the database for existing users
		$sql = "SELECT * FROM depositors_account WHERE email = '$email' or phonenumber = '$phonenum' 
        or accountnumber = '$accountnumber'";
            $results = mysqli_query($db, $sql);
                if ($results->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($results)) {
                        $user_email = $row['email'];
                        $user_num = $row['phonenumber'];
                        $user_accnum = $row['accountnumber'];

                        if($user_email === $email) {
                            array_push($errors, "Email ID already has a registered Account Number");
                        }
                        if($user_num === $phonenum) {
                            array_push($errors, "Phone Number already has a registered Account Number");
                        }
                        if($user_accnum === $accountnumber) {
                            array_push($errors, "Account Number already exist");
                        }
                    }
                }
            if (count($errors) === 0) {
                
                //creates a new table named bankbook per customer
                    $sqltbl = "CREATE TABLE bankbook_".$accountnumber."(
                        id int PRIMARY KEY AUTO_INCREMENT,
                        acc_num VARCHAR(15),
                        usern VARCHAR(255),
                        transaction_date DATETIME,
                        transactions VARCHAR(255),
                        withdrawal DOUBLE,
                        deposit DOUBLE,
                        balance DOUBLE)";
                    $res = mysqli_query($db, $sqltbl);

                $query = "INSERT INTO depositors_account (firstname, middlename, lastname, gender, birthdate, 
                birthplace, email, phonenumber, address, civil_status, accountnumber)
                VALUES ('$firstname', '$middlename', '$lastname', '$gender', '$birthdate', '$birthplace', 
                '$email', '$phonenum', '$address', '$civil_status', '$accountnumber')";
                    $query2 = "INSERT INTO bankbook_".$accountnumber."(acc_num, usern, transaction_date, transactions, 
                    withdrawal, deposit, balance) VALUES ('$accountnumber', '', now(), 'Opening of Account', '0', '$openingbalance', 
                    '$openingbalance')";

                        mysqli_query($db, $query);
                        mysqli_query($db, $query2);

                        $email_address = $email;
                        $subject = "Gentlemen's National Bank Notification | Depositor's Account Number";
                        $message = "Thank you for choosing GNB as your Bank!
                        \n\nYour Account Number is: $accountnumber.
                        \nYou will use your Account Number for you to create an Online Account.";
                        $sender = "From: gnbphilippines@gmail.com";
                        mail($email_address, $subject, $message, $sender);

                            array_push($success, "Depositor Added Successfully. 
                                        Account Number has been sent to his/her Email Adress");
                                
                                $query_logfile = "INSERT INTO manager_logfile (manager_user, action, date)
                                VALUES ('$username', 'Added New Depositor with an Account Number of $accountnumber', NOW())";
                                mysqli_query($db, $query_logfile);
                }
    }
?>
<?php
include('db_con.php');
include('login_action.php');
$accountnumber = "";
$amount = "";
$password = "";
$errors = array();
$success = array();
$limit = 50000;
$limit_balance = 500000;
$invalid_amount = 0;
$username = $_SESSION['customersuccess'];

if (isset($_POST['transfer'])) {
    $accountnumber = $_POST['accountnumber'];
    $amount = $_POST['amount'];
    $password= $_POST['password'];
    $password = md5($password);

    if($amount <= $invalid_amount) {
        array_push($errors, "Invalid Amount");
    }
    else {
            $receiver_acc_num = "SELECT accountnumber FROM depositors_account WHERE accountnumber = $accountnumber";
                $receiver_acc_num_res = mysqli_query($db, $receiver_acc_num);

                if(mysqli_num_rows($receiver_acc_num_res) > 0){

                    $sender_check_query = "SELECT accountnumber, email FROM depositors_account WHERE username = '$username'";
                        $sender_res = mysqli_query($db, $sender_check_query);
                            $sender_res2 = mysqli_fetch_assoc($sender_res);
                                $sender_accnum = $sender_res2['accountnumber'];
                                $sender_email = $sender_res2['email'];
        
                    $receiver_check_query = "SELECT accountnumber, username, email, firstname, lastname FROM depositors_account WHERE accountnumber = $accountnumber";
                        $receiver_res = mysqli_query($db, $receiver_check_query);
                            $receiver_res2 = mysqli_fetch_assoc($receiver_res);
                                $receiver_accnum = $receiver_res2['accountnumber'];
                                    $receiver_usern = $receiver_res2['username'];
                                    $receiver_email = $receiver_res2['email'];
                                    $receiver_fname = $receiver_res2['firstname'];
                                    $receiver_lname = $receiver_res2['lastname'];

                    $rec_balance = "SELECT balance FROM bankbook_$receiver_accnum ORDER BY transaction_date DESC LIMIT 1";
                        $receiver_balance_res = mysqli_query($db, $rec_balance);
                            $receiver_balance_res2 = mysqli_fetch_assoc($receiver_balance_res);
                                $receiver_balance = $receiver_balance_res2['balance'];
                                    $receiver_final_balance = $receiver_balance + $amount;
            
                        $send_balance = "SELECT balance FROM bankbook_$sender_accnum ORDER BY transaction_date DESC LIMIT 1";
                            $sender_balance_res = mysqli_query($db, $send_balance);
                                $sender_balance_res2 = mysqli_fetch_assoc($sender_balance_res);
                                    $sender_balance = $sender_balance_res2['balance'];
                                        $sender_final_balance = $sender_balance - $amount;

            if ($receiver_balance === $limit_balance) {
            array_push($errors, "The receiver has exceeded the Maximum Balance");
            }
            else {
            $check_query = "SELECT * FROM depositors_account WHERE username = '$username' LIMIT 1";
            $results = mysqli_query($db, $check_query);
                $user = mysqli_fetch_assoc($results);
                $userpass = $user['password'];
                $user_fname = $user['firstname'];
                $user_lname = $user['lastname'];
                    if($userpass !== NULL && $userpass === $password) {
                        if ($amount > $sender_balance) {
                            array_push($errors, "Insufficient Balance");
                        }
                        else if ($amount >= $limit){
                            array_push($errors, "You have reached the Maximum Cash Transferring Amount Allowed.");
                        }
                        else if ($accountnumber === $sender_accnum) {
                            array_push($errors, "You can only transfer funds to other accounts.");
                        }
                        else {
                                $sender_update_query = "INSERT INTO bankbook_$sender_accnum (acc_num, usern, transaction_date, transactions, 
                                withdrawal, deposit, balance)
                                VALUES (NULL, NULL, NOW(), 'Transferred Money to $receiver_usern', '$amount', '0', '$sender_final_balance')";
                                mysqli_query($db, $sender_update_query);
                                $date = date("Y-m-d H:i:s");
                                    $email = $sender_email;
                                    $subject = "Gentlemen's National Bank Notification | Funds Transfer ";
                                    $message = "Hello, Mr/Ms. $user_fname $user_lname!
                                    \n\nThank you for choosing GNB as your Online Banking Service Provider.
                                    \nHere is the review of your recent transaction;
                                    \n\nAmount Transferred: $amount
                                    \nTransferred to: $receiver_fname $receiver_lname
                                    \nDate & Time Transerred: $date";
                                    $sender = "From: gnbphilippines@gmail.com";
                                    mail($email, $subject, $message, $sender);

                                $receiver_update_query = "INSERT INTO bankbook_$receiver_accnum (acc_num, usern, transaction_date, transactions, 
                                withdrawal, deposit, balance)
                                VALUES (NULL, NULL, NOW(), 'Received Money from $username', '0', '$amount', '$receiver_final_balance')";
                                mysqli_query($db, $receiver_update_query);

                                    $email = $receiver_email;
                                    $subject = "Gentlemen's National Bank Notification | Funds Transfer ";
                                    $message = "Hello, Mr/Ms. $receiver_fname $receiver_lname!
                                    \n\nThank you for choosing GNB as your Online Banking Service Provider.
                                    \nHere is the review of your recent transaction;
                                    \n\nAmount Received: $amount
                                    \nReceived from: $user_fname $user_lname
                                    \nDate & Time Transerred: $date";
                                    $sender = "From: gnbphilippines@gmail.com";

                                    mail($email, $subject, $message, $sender);

                                    $_SESSION['transfer_successful'] = true;
                                    header('location: transfer_successful.php');

                            $query_logfile = "INSERT INTO customer_logfile (username, accountnumber, action, date)
                            VALUES ('$username', '$sender_accnum', 'Transferred an Amount of $amount to $receiver_usern', NOW())";
                                mysqli_query($db, $query_logfile);
                        }
                    }
                    else {
                        array_push($errors, "Incorrect Password");
                    }                
                    }
                    }
                    else {
                        array_push($errors, "Account Number doesn't exist.");
                    }
            }
        }
?>
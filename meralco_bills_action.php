<?php
include('db_con.php');
include('login_action.php');
$accountnumber = "";
$amount = "";
$password = "";
$errors = array();
$success = array();
$invalid_amount = 0;

$username = $_SESSION['customersuccess'];

if (isset($_POST['send'])) {
    $accountnumber = $_POST['accountnumber'];
    $amount = $_POST['amount'];
    $password= $_POST['password'];
    $password = md5($password);
    
    if($amount <= $invalid_amount) {
        array_push($errors, "Invalid Amount");
    }
    else {
        $payee_bal = "SELECT balance FROM bankbook_$accountnumber ORDER BY transaction_date DESC LIMIT 1";
            $payee_bal_res = mysqli_query($db, $payee_bal);
                $payee_bal_res2 = mysqli_fetch_assoc($payee_bal_res);
                    $payee_balance = $payee_bal_res2['balance'];
                        $payee_balance_final = $payee_balance - $amount;
    
		$payee_check_query = "SELECT * FROM depositors_account WHERE username = '$username' LIMIT 1";
            $results = mysqli_query($db, $payee_check_query);
                $user = mysqli_fetch_assoc($results);
                $user_lastname = $user['lastname'];
                $userpass = $user['password'];
                $user_email = $user['email'];
                    if($userpass === $password) {
                        if ($amount > $payee_balance) {
                            array_push($errors, "Insufficient Balance");
                        }
                        else {
                                $payee_update_query = "INSERT INTO bankbook_$accountnumber (acc_num, usern, transaction_date, transactions, 
                                withdrawal, deposit, balance)
                                VALUES (NULL, NULL, NOW(), 'Payment Transferred to Meralco', '$amount', '0', '$payee_balance_final')";
                                    $date = date("Y-m-d H:i:s");
                                    $email = $user_email;
                                    $subject = "Gentlemen's National Bank Notification | Bills Receipt Meralco";
                                    $message = "Hello, Mr/Ms. $user_lastname!
                                    \n\nThank you for choosing GNB as your Online Banking Service Provider.
                                    \nHere is the receipt of your Transaction;
                                    \n\nAmount: $amount
                                    \nBilled to: Manila Electronic Company (Meralco)
                                    \nDate & Time of Transfer: $date";
                                    $sender = "From: gnbphilippines@gmail.com";
                                    mail($email, $subject, $message, $sender);

                                    $query_logfile = "INSERT INTO customer_logfile (username, accountnumber, action, date)
                                    VALUES ('$username', '$accountnumber', 'Transferred an amount of $amount to Meralco', NOW())";
                                        mysqli_query($db, $query_logfile);
                                        mysqli_query($db, $payee_update_query);
                                        $_SESSION['meralco_bills_successful'] = true;
                                            header('location: meralco_bills_successful.php');
                        }
                    }
                    else {
                        array_push($errors, "Incorrect Password");
                    }
                }
        }
?>
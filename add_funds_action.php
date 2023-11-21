<?php
session_start();
include('db_con.php');
    $accountnumber = "";
    $amount = "";
    $limit = 100000;
    $limit_balance = 500000;
    $errors = array();
    $success = array();
    $username = $_SESSION['managersuccess'];
    $invalid_amount = 0;
        if (isset($_POST['add'])) {
            $accountnumber = $_POST['accountnumber'];
            $amount = $_POST['amount'];

            if ($amount <= $invalid_amount) {
                array_push($errors, "Invalid Amount");
            }
            else if ($amount > $limit) {
                array_push($errors, "You have exceeded the maximum amount allowed to deposit");
            }
            else {
                $check_balance_query = "SELECT * FROM bankbook_$accountnumber ORDER BY transaction_date DESC LIMIT 1";
                    $cbq_res = mysqli_query($db, $check_balance_query);
                        $cbq_result = mysqli_fetch_assoc($cbq_res);
                            $cbq_final_result = $cbq_result['balance'];
                            $client_add_fund = $cbq_final_result + $amount;

                if ($cbq_final_result > $limit_balance) {
                    array_push($errors, "You have exceeded the limit of Funds");
                }
                else {
                $add_fund_query = "INSERT INTO bankbook_$accountnumber(acc_num, usern, transaction_date, transactions, 
                withdrawal, deposit, balance)
                VALUES (NULL, NULL, NOW(), 'Deposit an amount of $amount', '0', '$amount', '$client_add_fund')";
                mysqli_query($db, $add_fund_query);
                $_SESSION['add_funds_successful'] = true;
                    header('location: add_funds_successful.php');

                $query_logfile = "INSERT INTO manager_logfile (manager_user, action, date)
                VALUES ('$username', 'Added Funds to Account Number $accountnumber', NOW())";
                    mysqli_query($db, $query_logfile);
                }
            }
        }
?>
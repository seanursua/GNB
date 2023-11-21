<?php
session_start(); 
include ('db_con.php');
$name = "";
$email = "";
$message = "";
$success = array();
        if (isset($_POST['send'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

                $email_address = "gnbphilippines@gmail.com";
                $subject = "Message from $email";
                $your_message = $message;
                $sender = "From: $email";
                mail($email_address, $subject, $message, $sender);

                array_push($success, "Message sent successfully.");
        }
?>
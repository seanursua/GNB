<?php
    include('db_con.php');
    session_start();
    session_destroy();
    if (isset($_GET['depositorlogout'])) {
        unset($_SESSION['customersuccess']);
        header('location:session_expired.php');
    }
    else if (isset($_GET['adminlogout'])) {
        unset($_SESSION['adminsuccess']);
        header('location:session_expired.php');
    }
    else {
        header("location:index.php");        
    }
?>

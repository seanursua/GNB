<?php
    session_start();
    include('navbar.php');
    if (!isset($_SESSION['forgot_password_successful'])) {
        header('location: forgot_password.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" type="text/css" href="forgot_password_successful.css">
    <title>Forgot Password | Gentlemen's National Bank</title>
</head>
<body>
    <div class="wrapper">
        <form action="forgot_password_successful.php" method="post">
            <h2>Your password has been sent to your Email Account</h2>
            <button name="back" type="submit">Back to Login</button>
        </form>
    </div>
</body>
</html>
<?php
    include('db_con.php');
        if (isset($_POST['back'])) {
            header('location: login.php');
        }
?>
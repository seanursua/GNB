<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <title>Session Timeout | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="session_expired.css">
</head>
<body>
<nav>
    <a href="session_expired.php?YouHaveBeenLoggedOut"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    <ul>
        <li><a href="session_expired.php?YouHaveBeenLoggedOut">HOME</a></li>
            <li><a href="session_expired.php?YouHaveBeenLoggedOut">MANAGE
                <i class="fas fa-caret-down"></i>
                </a>
                    <ul class = "transfer">
                        <li><a href="session_expired.php?YouHaveBeenLoggedOut">Add Depositors</a></li>
                        <li><a href="session_expired.php?YouHaveBeenLoggedOut">Manage Managers</a></li>
                        <li><a href="session_expired.php?YouHaveBeenLoggedOut">Manage Depositors</a></li>
                    </ul>
            </li>
        </ul>
</nav>

    <div class="wrapper">
    <form action="session_expired.php?YouHaveBeenLoggedOut" method="post">
         <h2>Session Expired</h2>
         <h6>You have been inactive for 10 minutes, thus 
         the system automatically logged you out for securty purposes. 
         If you still have transactions, please log in again.<h6>
     	<a href="index.php">Back to Home</a>
     </form>
    </div>
</body>
</html>
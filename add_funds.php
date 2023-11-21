<?php
    include('idle_time.php');
    include('add_funds_action.php');
    if(!isset($_SESSION['managersuccess'])) {
        header('location: index.php');
    }
    if (isset($_GET['id'])) {
        $_SESSION['id'] = $_GET['id'];
    }
        $sql = "SELECT accountnumber FROM depositors_account WHERE id=".$_SESSION['id'];
            $result = mysqli_query($db, $sql);
            if ($result->num_rows > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $accountnumber = $row['accountnumber'];
                }
            }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Add Funds | Gentlemen's National Bank</title>
    <link rel="stylesheet" type="text/css" href="add_funds.css">
</head>
<body>
<nav>
    <div class="gnblogo">
      <a href="manager_home.php"><img src="images/GNBLOGOW.png" alt="gnb"></a>
    </div>
    <ul class="nav-links">
        <li><a href="manager_home.php">HOME</a></li>
        <li><a href="add_depositors.php">ADD DEPOSITORS</a></li>
        <li><a class="active" href="manage_depositors.php">MANAGER DEPOSITORS</a></li>
    </ul>
    <div class="hamburger">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
</nav>
    <div class="wrapper">
    <form action="add_funds.php" method="post">
         <h2>Add Funds</h2>
        <?php include('errors.php');
              include('success.php'); ?>
        <input type="number" name="accountnumber" value="<?php echo $accountnumber ?>" readonly required>
        <input type="number" name="amount" placeholder="Amount" required>
     	<button name="add" type="submit">Add Funds</button>
     </form>
    </div>
    <script src="app.js"></script>
</body>
</html>


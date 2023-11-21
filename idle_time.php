<?php
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
            header("location:logout.php?logout=true");
        }
        $_SESSION['LAST_ACTIVITY'] = time(); 
?>
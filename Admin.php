<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: Login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Page</title>
</head>
<body>
    <?php
        include('AdminNavbar.php');
    ?>
    <h1>Welcome to Mobile SellerCentre!!</h1>
    
</body>
</html>
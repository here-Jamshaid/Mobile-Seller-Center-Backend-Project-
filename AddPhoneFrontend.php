<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ProductAdd.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobile Addition</title>
</head>
<body>
<?php
        include('AdminNavbar.php');
    ?>
    <form method="POST" action="AddPhoneBackend.php" enctype="multipart/form-data">
       <div class="imgcontainer">
        <img src="Pictures/img_avatar2.png" alt="Avatar" class="avatar">
    </div>
    <div class="container">
        <label for="uname"><b>Phone Name</b></label>
        <input type="text" placeholder="Enter name" name="mobile_name" required>
        <label for="psw"><b>Phone Price</b></label>
        <input type="text" placeholder="Enter price" name="mobile_price" required>
        <label for="uname"><b>Phone Pic</b></label>
        <input type="file" name="mobile_pic" required>
        <label for="psw"><b>Phone Details</b></label>
        <input type="text" placeholder="Enter details" name="mobile_detail" required>
        <div class="btn">
        <button type="submit">Save</button> <button type="reset">Reset</button>
        </div>
    </div>
    </form>
</body>
</html>
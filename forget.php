<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="LoginSignup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget</title>
</head>
<body>
 <form method="post" action ="<?php echo $_SERVER['PHP_SELF'];?>">
	    <div class="imgcontainer">
        <img src="Pictures/img_avatar2.png" alt="Avatar" class="avatar">
      </div>
      <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="user_email" required>
        <button type="submit">Reset Password</button>

       
      </div>
</form>
</body>
</html>
<?php
    // Include database connection and session start
    session_start();

    include('DbConnection.php');
    function password_ency($password) {
        $password = '$#%_1'.strrev($password).'&^##';
        $password = md5($password);
        return $password;
       }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate email
        $email = $_POST['user_email'];

        // Check if the email exists in the database
        $sql_check_email = "SELECT * FROM users WHERE user_email='$email'";
        $result = mysqli_query($db_connection, $sql_check_email);

        if (mysqli_num_rows($result) > 0) {
            // Email exists, update the password
            $new_password = password_ency("abcdef");

            $sql_update_password = "UPDATE users SET user_pass='$new_password' WHERE user_email='$email'";
            if (mysqli_query($db_connection, $sql_update_password)) {
                echo '<script>alert("Password (abcdef) Reset Successfully!");</script>';
                echo '<script>window.location.href = "Login.php";</script>';
                exit;
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            echo "Email does not exist in the database.";
        }
    }
    ?>

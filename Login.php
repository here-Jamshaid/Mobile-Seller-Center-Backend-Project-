<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="LoginSignup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action ="<?php echo $_SERVER['PHP_SELF'];?>">
	    <div class="imgcontainer">
        <img src="Pictures/img_avatar2.png" alt="Avatar" class="avatar">
      </div>
      <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="user_email" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="user_pass" required>
        <a href="forget.php" style=" text-decoration:none;"> Forget Password </a>

        <button type="submit">Login</button>

       
      </div>
      <div class="container" style="background-color: white;">
        <span class="psw"><a href="Signup.php">New User? Sign up</a></span>
  </div>
</form>
</body>
</html>
<?php
include('DbConnection.php');
function password_ency($password) {
    $password = '$#%_1'.strrev($password).'&^##';
    $password = md5($password);
    return $password;
}
session_start();


if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo '<script>alert("You are already logged in!");</script>';
    echo '<script>window.location.href = "Admin.php";</script>';
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_email = $_POST['user_email'];
    $user_password = password_ency($_POST['user_pass']);
    $qry = "SELECT user_email, user_pass FROM users WHERE user_email='$user_email' AND user_pass='$user_password'";
    $data = mysqli_query($db_connection, $qry);
    if(mysqli_num_rows($data) > 0) {
		$user_data = mysqli_fetch_assoc($data);
		if($user_data['user_email'] == $user_email && $user_data['user_pass'] == $user_password) {
			$_SESSION['logged_in'] = true;
			header("Location: Admin.php");
			exit;
		}
	} else {
        echo '<script>alert("Incorrect email or password!");</script>';
		$error = "Incorrect email or password";
	}
	
}


?>






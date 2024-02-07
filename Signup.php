<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="LoginSignup.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div class="imgcontainer">
    <img src="Pictures/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
  <label for="uname"><b>Name</b></label>
    <input type="text" placeholder="Enter name" name="user_name" required>
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="user_email" required>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="user_pass" required>
    <button type="submit" >Save</button>
  </div>
</body>
</html>
<?php
include('DbConnection.php');
function password_ency($password) {
 $password = '$#%_1'.strrev($password).'&^##';
 $password = md5($password);
 return $password;
}
if($_SERVER['REQUEST_METHOD']=='POST') {
$user_name= $_POST['user_name'];
$user_email= $_POST['user_email'];
$user_pass= password_ency ($_POST['user_pass']);
$qry= "INSERT INTO users (user_name,user_email,user_pass) VALUES ('$user_name','$user_email','$user_pass')";

$data_save=mysqli_query($db_connection,$qry);

if($data_save) {
	header("Location: Login.php");
	exit;
}
}
?>

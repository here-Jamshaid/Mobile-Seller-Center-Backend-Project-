<?php
 include('DbConnection.php');
$mobile_name = $_POST['mobile_name'];
$mobile_price = $_POST['mobile_price'];
$file_path = $_FILES['mobile_pic']['name'];
move_uploaded_file($_FILES['mobile_pic']['tmp_name'],$file_path);
$mobile_detail = mysqli_real_escape_string($db_connection, $_POST['mobile_detail']);

$save = "INSERT INTO mobile (mobile_name, mobile_price,mobile_detail,mobile_pic)
 VALUES ('$mobile_name', '$mobile_price','$mobile_detail', '$file_path')";
$result = mysqli_query($db_connection, $save);
if($result){
header('location:Admin.php');
}
else{
ECHO "ERROR ___".mysqli_error($db_connection);
}

?>  
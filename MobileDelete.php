<?php
include('DbConnection.php');
$id = $_GET['selected_id'];
$q = "DELETE FROM mobile WHERE mobile_id='$id'";
$q_status = mysqli_query($db_connection, $q);
If($q_status){ 
header('location:PhoneList.php');
} 


?>
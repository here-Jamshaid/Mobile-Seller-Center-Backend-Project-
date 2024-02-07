<?php

$id = $_GET['selected_id'];
include('DbConnection.php');
$qry = "SELECT * FROM mobile WHERE mobile_id='$id'";
$data = mysqli_query($db_connection, $qry);
$mobile_data = mysqli_fetch_assoc($data);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $mobile_name = $_POST['mobile_name'];
    $mobile_detail = $_POST['mobile_detail'];
    $selected_id = $_POST['selected_id'];

    $update_query = "UPDATE mobile SET mobile_name='$mobile_name', mobile_detail='$mobile_detail' WHERE mobile_id='$selected_id'";
    if (mysqli_query($db_connection, $update_query)) {
        // Redirect back to PhoneList.php after successful update
        header("Location: PhoneList.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db_connection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Panel.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <h2 style="color: red;">Mobile Update</h2>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table>
            <tr>
                <th>Mobile Name</th>
                <td><input type="text" name="mobile_name" value="<?php echo $mobile_data['mobile_name']; ?>" /></td>
            </tr>
            <tr>
                <th>Mobile Details</th>
                <td><textarea name="mobile_detail"><?php echo $mobile_data['mobile_detail']; ?></textarea></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="selected_id"  value="<?php echo $id; ?>" >
                </td>

                <td>
                    <input type="submit" name="submit" value="Update" />
                    <input type="reset" value="RESET" />
                </td>
            </tr>
        </table>    
    </form>
</body>
</html>

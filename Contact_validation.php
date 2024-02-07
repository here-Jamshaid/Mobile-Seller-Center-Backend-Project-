<?php
include('DbConnection.php');
$nameErr = $phoneErr = $emailErr = $cityErr = $detailErr = "";
$name = $phone = $email = $city = $detail = "";

if(isset($_COOKIE['contact_submissions'])) {
    $submission_count = $_COOKIE['contact_submissions'] + 1;
} else {
    $submission_count = 1;
}

// Set cookie to track contact form submissions
setcookie('contact_submissions', $submission_count, strtotime('tomorrow'), '/');

if($submission_count > 3) {
    echo '<script>alert("Sorry! you should not able to fill the form more than 3 times. ");</script>';
    echo '<script>window.location.href = "Admin.php";</script>';
    exit; // Prevent further processing if submission limit is reached
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Phone validation
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "Invalid phone number format";
        }
    }

    // Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // City validation
    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $city = test_input($_POST["city"]);
    }

    // Detail validation
    if (empty($_POST["detail"])) {
        $detailErr = "Details are required";
    } else {
        $detail = test_input($_POST["detail"]);
    }

    if (empty($nameErr) && empty($phoneErr) && empty($emailErr) && empty($cityErr) && empty($detailErr)) {
        // All inputs are valid, insert data into database
        $sql = "INSERT INTO contact_us (name, phone, email, city, detail)
                VALUES ('$name', '$phone', '$email', '$city', '$detail')";

        if (mysqli_query($db_connection, $sql)) {
            echo '<script>alert("Message Sent!");</script>';
        } else {
            echo '<div class="error-message">Error: ' . mysqli_error($db_connection) . '</div>';
        }
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

header("location:Contact.php? param1={$nameErr}&param2={$phoneErr}&param3={$emailErr}&param4={$cityErr}&param5={$detailErr}")
?>
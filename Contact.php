<?php 
$nameErr = $phoneErr = $emailErr = $cityErr = $detailErr = "";
if(isset($_GET['param1']))
{
    $nameErr=$_GET["param1"];
    $phoneErr=$_GET["param2"];
    $emailErr=$_GET["param3"];
    $cityErr=$_GET["param4"];
    $detailErr=$_GET["param5"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        input[type="tel"],
        textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #1b1523;
            color: #fff;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .error-message {
            color: red;
            margin-bottom: 10px;
        }
        .success-message {
            color: blue;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <form method="post" action="Contact_validation.php">
            <input type="text" name="name" placeholder="Your Name">
            <span class="error-message"><?php echo $nameErr; ?></span>

            <input type="tel" name="phone" placeholder="Your Phone">
            <span class="error-message"><?php echo $phoneErr; ?></span>

            <input type="text" name="email" placeholder="Your Email">
            <span class="error-message"><?php echo $emailErr; ?></span>

            <input type="text" name="city" placeholder="Your City">
            <span class="error-message"><?php echo $cityErr; ?></span>

            <textarea name="detail" rows="5" placeholder="Your Message"></textarea>
            <span class="error-message"><?php echo $detailErr; ?></span>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>

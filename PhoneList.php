<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mobileList</title>
    <style>
        table {
            margin: auto;
            width: 90%;
            margin-top: 90px;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid black;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        th {
            background-color: #04AA6D;
            color: white;
        }

        #searchInput
        {
            border:1px solid black;
            border-radius:25px;
            background:white;
            outline:none;
            width:15%;
            padding:10px;
            margin:5px;
        }
        #submit 
        {
            border:1px solid black;
            border-radius:25px;
            background:white;
            outline:none;
            padding:10px;
            margin:5px;
            font-weight:bold;
        }
        #submit:hover
        {
            box-shadow:1px 3px 5px grey;
        }
        #searchResults
        {
           color:black;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#searchInput').on('keyup', function(){
                var query = $(this).val();
                if(query !== ''){
                    $.ajax({
                        url: 'search.php',
                        method: 'POST',
                        data: {query: query},
                        success: function(data){
                            $('#searchResults').html(data);
                        }
                    });
                } else {
                    $('#searchResults').html('');
                }
            });
        });
    </script>
</head>
<body>
    <?php include('AdminNavbar.php'); ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" id="searchInput" name="searchInput" placeholder="Search products...">
        <input type="submit" id="submit"name="search" value="Search">
    </form>

    <div id="searchResults"></div>

    <table>
        <tr>
            <th>Id</th>
            <th>Pic</th>
            <th>Mobile Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Operations</th>
        </tr>
        <?php
        include('DbConnection.php');

        // Check if search form is submitted
        if(isset($_POST['search'])) {
            $searchInput = $_POST['searchInput'];
            $qry = "SELECT * FROM mobile WHERE mobile_name LIKE '%$searchInput%'";
        } else {
            $qry = "SELECT * FROM mobile";
        }

        $data = mysqli_query($db_connection, $qry);

        if(mysqli_num_rows($data) > 0) {
            while($mobile_data = mysqli_fetch_assoc($data)) {
                $id = $mobile_data['mobile_id'];
        ?>
        <tr>
            <td><?php echo $mobile_data['mobile_id']; ?></td>
            <td><img src="<?php echo $mobile_data['mobile_pic']; ?>"> </td>
            <td><?php echo $mobile_data['mobile_name']; ?></td>
            <td><?php echo $mobile_data['mobile_detail']; ?></td>
            <td><?php echo $mobile_data['mobile_price']; ?></td>
            <td>
                <a href="UpdateMobileFrontend.php?selected_id=<?php echo $id ?>">Edit | </a>
                <a href="MobileDelete.php?selected_id=<?php echo $id ?>">Delete</a>
            </td>
        </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='6'>No results found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

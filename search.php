<!-- search.php -->
<?php
include('DbConnection.php');

// Fetch search query from Ajax POST request
if(isset($_POST['query'])) {
    $query = $_POST['query'];

    // Search products in the database based on the query
    $search_query = "SELECT * FROM mobile WHERE mobile_name LIKE '%$query%'";
    $search_result = mysqli_query($db_connection, $search_query);

    // Display search suggestions
    if(mysqli_num_rows($search_result) > 0){
        while($row = mysqli_fetch_assoc($search_result)){
            echo '<div>' . $row['mobile_name'] . '</div>';
        }
    } else {
        echo '<div>No results found</div>';
    }
}
?>

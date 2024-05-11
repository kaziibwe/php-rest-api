<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include('../includes/config.php');


$sql= "SELECT * FROM users";

$result = mysqli_query($conn, $sql) or die("SQL Queary Failed.");
if(mysqli_num_rows($result)>0){
 $output =mysqli_fetch_all($result, MYSQLI_ASSOC);
 echo json_encode($output);
}else{

    echo json_encode(array('message'=>'No records found.','status'=>false));

}



// <?php
// error_reporting(E_ALL);
// ini_set('display_errors', true);

// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');

// // Include database configuration file
// include('../includes/config.php');

// // Check if the database connection is successful
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// $sql = "SELECT * FROM users";
// $result = mysqli_query($conn, $sql);

// if ($result) {
//     if (mysqli_num_rows($result) > 0) {
//         $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
//         echo json_encode($output);
//     } else {
//         echo json_encode(array('message' => 'No records found.', 'status' => false));
//     }
// } else {
//     echo "SQL Query Failed: " . mysqli_error($conn);
// }

// // Close the database connection
// mysqli_close($conn);
?>

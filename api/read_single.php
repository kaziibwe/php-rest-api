<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// $data = json_decode(file_get_contents("php://input"), true);
// $user_id = $data['id'];

// $trans_id = $_GET['transaction_id'];

// extract the id from the link
$user_id = $_GET['id'];

include('../includes/config.php');


$sql= "SELECT * FROM users WHERE id ={$user_id}  ";

$result = mysqli_query($conn, $sql) or die("SQL Queary Failed.");
if(mysqli_num_rows($result)>0){
 $output =mysqli_fetch_all($result, MYSQLI_ASSOC);
 echo json_encode($output);
}else{


    echo json_encode(array('message'=>'No records found.','status'=>false));

}



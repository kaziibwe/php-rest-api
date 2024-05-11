<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Athorization, X-Requested-With');

include('../includes/config.php');

$user_id = $_GET['id'];

if (!(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users where id='{$user_id}'")) > 0)) {
    echo json_encode(array('message'=>'user Not  found.','status'=>true),200);
mysqli_close($conn);
}
$query =  "DELETE FROM users WHERE id = '{$user_id}'";
$result = mysqli_query($conn, $query);

if($result){
    echo json_encode(array('message'=>'user deleted sucessfully.','status'=>true),200);
}else{
    echo json_encode(array('message'=>'Something went wrong.','status'=>false),500);

}

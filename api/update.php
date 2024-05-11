<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

//

include('../includes/config.php');

$user_id = $_GET['id'];

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$role = $data['role'];
$age = $data['age'];

if (!(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users where id='{$user_id}'")) > 0)) {
    echo json_encode(array('message'=>'user Not  found.','status'=>true),200);
mysqli_close($conn);
}

$query =  "UPDATE users SET email = '{$email}', role = '{$role}', age = '{$age}'  WHERE id = '{$user_id}'";
$result = mysqli_query($conn, $query);

if($result){
    echo json_encode(array('message'=>'user update sucessfully.','status'=>true),200);
}else{
    echo json_encode(array('message'=>'Something went wrong.','status'=>false),500);

}


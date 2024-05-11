<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Athorization, X-Requested-With');
//
include('../includes/config.php');

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$role = $data['role'];
$age = $data['age'];

$query = "INSERT INTO users(`email`,`role`,`age`) 
values('$email','$role','$age')";
$result = mysqli_query($conn, $query);

if($result){
    echo json_encode(array('message'=>'user created sucessfully.','status'=>true),200);
}else{
    echo json_encode(array('message'=>'Something went wrong.','status'=>false),500);

}
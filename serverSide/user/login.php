<?php
// include database and object files
include_once '../config/database.php';
include_once '../objects/user.php';
include_once '../builders/responseBuilder.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

// prepare user object
$user = new User();
$data = json_decode(file_get_contents('php://input'));

$statusCode = $user->login($data);
$responseBuilder = new ResponseBuilder();

if ($statusCode == OK) {
    $user_arr=$responseBuilder->loginSuccess($data->email);
} else {
    $user_arr=$responseBuilder->failureResponse($statusCode);
}

print_r(json_encode($user_arr));
?>
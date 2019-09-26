<?php
include_once '../objects/user.php';
include_once '../base/constants.php';
include_once '../builders/responseBuilder.php';

//To avoid cross domain issue - allow it to be accessible from all the domain
// if you want specific domain mention it in the place of * ex: www.guvi.co
header('Access-Control-Allow-Origin: *');

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
    throw new Exception('Request method must be POST!');
}

$user = new User();
$userDetails = json_decode(file_get_contents('php://input'));
$statusCode = $user->signup($userDetails);
$responseBuilder = new ResponseBuilder();

if ($statusCode == OK) {
    $user_arr=$responseBuilder->regsiterationSuccess($userDetails->email);
} else {
    $user_arr=$responseBuilder->failureResponse($statusCode);
}

print_r(json_encode($user_arr));
?>
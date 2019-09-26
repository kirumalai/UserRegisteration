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
$input = json_decode(file_get_contents('php://input'));
$details = $user->details($input->email);
$responseBuilder = new ResponseBuilder();

if (!empty($details)) {
    $user_arr=$responseBuilder->userDetailsSuccess($details);
} else {
    $user_arr=$responseBuilder->failureResponse(jsonError);
}

print_r(json_encode($user_arr, JSON_PRETTY_PRINT));
?>
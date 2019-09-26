<?php 
include_once '../base/constants.php';
class ResponseBuilder {
    public function regsiterationSuccess($email) {
       return array(
            "status" => true,
            "message" => "Registeration success!",
            "email" => $email
        );
    }

    public function loginSuccess($email) {
        return array(
             "status" => true,
             "message" => "login success!",
             "email" => $email
         );
     }

     public function userDetailsSuccess($details) {
        return array(
             "status" => true,
             "details" => $details
         );
     }

    public function failureResponse($statusCode) {
        return array(
            "status" => false,
            "statusCode" => $statusCode,
            "message" => $this->getFailureStatusMessage($statusCode)
        );
    }

    function getFailureStatusMessage($statusCode) {
		$failureArray = array(
			DatabaseIssue => "Sorry!!! Something went wrong, try again some times later $statusCode",  
			AlreadyExist => 'User name already exsist!',
            UnknownFailure => 'Sorry!!! Something went wrong, try again some times later',
            loginFailure => 'Invalid Username or Password!',
            zeroRowReturned => 'Invalid Username or Password!');  
		return ($failureArray[$statusCode]) ? $failureArray[$statusCode] : $failureArray[UnknownFailure];
	}
}
?>
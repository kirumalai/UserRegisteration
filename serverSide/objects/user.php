<?php
include_once '../base/constants.php';
include_once '../base/backEndValidator.php';
include_once '../storage/storageManager.php';

class User{
    public $backEndValidator;
    private $storageManager;
    
    public function __construct() {
        $this->backEndValidator = new BackEndValidator();
        $this->created = date('Y-m-d H:i:s');
        $this->storageManager = new storageManager();
        //all this should be injected for testing
                //     $this->id = $this->conn->lastInsertId(); -> if needed comment out

    }

    function signup($userDetail) {
        $mandatoryFields = array($userDetail->userName, $userDetail->password, $userDetail->email, $userDetail->age, $userDetail->gender, $userDetail->mobileNumber);
        if ($this->backEndValidator->isMandatoryFieldHasCompliant($mandatoryFields)) {
            return mandatoryFieldEmpty;
        }

        $dbStatus = $this->storageManager->DBStore->set($userDetail);
        if ($dbStatus == OK) {
           $jsonStatus = $this->storageManager->JSONStore->set($userDetail);
           return $jsonStatus;
        } else {
            return $dbStatus;
        }

    }

    function details($email) {
       return $this->storageManager->JSONStore->get($email);
    }

    function login($credentials) {
        $query = "SELECT
                    `id`, `email`
                FROM
                    " . $this->storageManager->DBStore->tableName . " 
                WHERE
                    email='".$credentials->email."' AND password='".$credentials->loginPassword."'";

        $status = $this->storageManager->DBStore->get($query);          
        return $status;
    }
}
?>
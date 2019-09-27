<?php 
include_once 'store.php';
include_once '../base/constants.php';
include_once '../config/database.php';

//needs to be done
class DBStore implements store {

    private $conn;
    public $tableName = "internDetails";
    private $created;
    public $id;

    public function __construct(){
        $database = new Database();
        $database->createDBIFRequired();
        $this->conn = $database->getConnection();
        $this->created = date('Y-m-d H:i:s');
    }

    public function set($userDetail) {

        if($this->isAlreadyExist($userDetail->email)) {
            return AlreadyExist;
        }

        $query = "INSERT INTO
                    " . $this->tableName . "
                SET
                    userName=:userName, password=:password, email=:email, age=:age, gender=:gender, mobileNumber=:mobileNumber, description=:description, created=:created";
    
        $stmt = $this->conn->prepare($query);

        //have to convert if needed
        //htmlspecialchars(strip_tags($userDetail->userName)
        // bind values
        $stmt->bindParam(":userName", $userDetail->userName);
        $stmt->bindParam(":password", $userDetail->password);
        $stmt->bindParam(":email", $userDetail->email);
        $stmt->bindParam(":age", $userDetail->age);
        $stmt->bindParam(":gender", $userDetail->gender);
        $stmt->bindParam(":mobileNumber", $userDetail->mobileNumber);
        $stmt->bindParam(":description", $userDetail->description);
        $stmt->bindParam(":created", $this->created);

        if($stmt->execute()){
            $this->id = $this->conn->lastInsertId();
            return OK;
        } else {
            return DatabaseIssue;
        }

    }

    function isAlreadyExist($email){
        $query = "SELECT * FROM $this->tableName WHERE email='$email'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function get($query) {
        $stmt = $this->conn->prepare($query);
        if($stmt->execute()){
            // return OK;
            if($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $this->id = $row['id'];
                return OK;
            } else {
                return zeroRowReturned;
            }
        } else {
            return DatabaseIssue;
        }
    }
}

?>
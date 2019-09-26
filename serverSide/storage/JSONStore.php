<?php 
include_once 'store.php';
include_once '../base/constants.php';

class JSONStore implements store {
   private $fileName = "internDetails.json";

    public function set($details) {
        try {
            
                if(file_exists($this->fileName)){
                    // Attempt to open the file
                    // $userDetailJsonFile = fopen($this->fileName, "a+");
                    echo $this->fileName;
                    $userDetailsFromFile = file_get_contents($this->fileName);
                    $userDetailsArray = json_decode($userDetailsFromFile, true);
                    
                    $userDetailsArray[$details->email] = $details;
                    $updatedUserDetailsArray = json_encode($userDetailsArray, JSON_PRETTY_PRINT);

                    if(file_put_contents($this->fileName, $updatedUserDetailsArray)) {
                        // echo 'Data successfully saved';
                        return OK;
                    }
                else {
                        // echo "error";
                        return jsonError;
                    }
                } 
            //first time
                else
                {
                    $fp = fopen($this->fileName, "w"); //fwrite($fp, json_encode($data_array)); 
                        if(fwrite($fp, json_encode(array($details->email=>$details)))) 
                        { 
                            // echo 'file created and data added';  
                            return OK;                       
                        } 
                        else
                        {
                            // echo "Not able to write to json"; 
                            return jsonFileNotFound;
                        } 
                        fclose($fp);
                }
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            return jsonFileNotFound;
        }
    }

    public function get($email) {
        $userDetailsFromFile = file_get_contents($this->fileName);
        $userDetailsArray = json_decode($userDetailsFromFile, true);
        return $userDetailsArray[$email];
    }
}

?>
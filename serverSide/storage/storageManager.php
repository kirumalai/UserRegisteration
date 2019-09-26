<?php 
include_once 'DBStore.php';
include_once 'JSONStore.php';

class storageManager {
    public $created;

    public $DBStore;
    public $JSONStore;
 
    // constructor with $db as database connection
    public function __construct(){
        $this->DBStore = new DBStore();
        $this->JSONStore = new JSONStore();
    }

}

?>
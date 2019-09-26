<?php 

interface ModelBuildable {
    public function buildSignupModel();
    public function buildLoginModel($email, $password);
}

// class ModelBuilder extends ModelBuildable {

// }

?>
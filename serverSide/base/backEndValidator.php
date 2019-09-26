<?php 
class BackEndValidator {
    function isMandatoryFieldHasCompliant($elements) {

        foreach ($elements as $element) { 
            if (empty($element)) { return true; }
        }
    
//         if(empty($uname))
//  {
//   $error = "enter your name !";
//   $code = 1;
//  }
//  else if(!ctype_alpha($uname))
//  {
//   $error = "letters only !";
//   $code = 1;
//  }
//  else if(empty($email))
//  {
//   $error = "enter your email !";
//   $code = 2;
//  }
//  else if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email))
//  {
//   $error = "not valid email !";
//   $code = 2;
//  }
//  else if(empty($mno))
//  {
//   $error = "Enter Mobile NO !";
//   $code = 3;
//  }
//  else if(!is_numeric($mno))
//  {
//   $error = "Numbers only !";
//   $code = 3;
//  }
//  else if(strlen($mno)!=10)
//  {
//   $error = "10 characters only !";
//   $code = 3;
//  }
//  else if(empty($upass))
//  {
//   $error = "enter password !";
//   $code = 4;
//  }
//  else if(strlen($upass) < 8 )
//  {
//   $error = "Minimum 8 characters !";
//   $code = 4;
//  }



    }
}
?>
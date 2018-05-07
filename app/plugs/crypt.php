<?php
class Enc{
    private $Llave = 'f1i1b2o3n5a8c13c21i34';
    
     public function s_Encrypt($string) {
       $result = '';
       for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr($this->Llave, ($i % strlen($this->Llave))-1, 1);
          $char = chr(ord($char)+ord($keychar));
          $result.=$char;
       }
       return base64_encode($result);
      }

      public  function s_Decrypt($string) {
           $result = '';
           $string = base64_decode($string);
           for($i=0; $i<strlen($string); $i++) {
              $char = substr($string, $i, 1);
              $keychar = substr($this->Llave, ($i % strlen($this->Llave))-1, 1);
              $char = chr(ord($char)-ord($keychar));
              $result.=$char;
           }
           return $result;
        }

}

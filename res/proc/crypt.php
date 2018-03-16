<?php
class Enc{
    private $llave = '1123581321';
    
     public function s_Encrypt($string) {
       $result = '';
       for($i=0; $i<strlen($string); $i++) {
          $char = substr($string, $i, 1);
          $keychar = substr($this->llave, ($i % strlen($this->llave))-1, 1);
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
              $keychar = substr($this->llave, ($i % strlen($this->llave))-1, 1);
              $char = chr(ord($char)-ord($keychar));
              $result.=$char;
           }
           return $result;
        }

}

<?php
namespace Utils;

class ValidateSession{

  public static function checkSession(){
    if(!isset($_SESSION["login"])){
    //  header("location:index.php");  
    }
  }
}
?>

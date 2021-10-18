<?php
class validateSession{
//session_start();

  public static function checkSession(){
  if(!isset($_SESSION["login"]))
    header("location:index.php");  
  }
}
?>

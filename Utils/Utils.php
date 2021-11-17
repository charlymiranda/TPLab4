<?php 
namespace Utils;

class Utils {
    public static function checkSession(){
        if(!(isset($_SESSION['admin']) || isset($_SESSION['student']))){
            $userNotLogged = true;
            require_once(VIEWS_PATH ."login.php");
        }
    }
    public static function checkAdminSession(){
        if(!(isset($_SESSION['admin']))){
            $userNotAdmin = true;
            require_once(VIEWS_PATH ."login.php");
        } else {
            $adminLogged = true;
        }
    }

    public static function checkStudentSession(){
        if(!(isset($_SESSION['student']))){
            $userNotStudent = true;
            require_once(VIEWS_PATH ."login.php");
        } else {
            $studentLogged = true;
        }
    }

    public static function strStartsWith(String $haystack, String $needle){
        return $needle != '' && strncmp($haystack, $needle, strlen($needle)) == 0;
    }

}
?>
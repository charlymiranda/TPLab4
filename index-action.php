<?php 
require_once("Config/Autoload.php");
use Models\User as User ;
if(isset($_POST)){

$userLogin = "user@hot.com";
$userPasswordLogin ="123456";
$message = "";

if($_POST['username'] == $userLogin){

    if($_POST['password'] == $userPasswordLogin){

        $user = new User();
        $user->setEmail($userLogin);
        $user->setPassword($userPasswordLogin);

        session_start();

        $_SESSION['login']= $user->getEmail();
        header("location:indexadd.php");

    }else{

        $message = "This Password is Incorrect ";
        require_once("index.php");
    }
}else{

    $message = "The Email is invalid";
    require_once("index.php");
}

}else{

    $message = "Please verify the data and try again";
    require_once("index.php");
}
?>
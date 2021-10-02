<?php 
require_once("Config/Autoload.php");
use Model\User as User ;
if(isset($_POST)){

$userLogin = "user@myapp.com";
$userPasswordLogin ="123456";
$message = "";

if($_POST['username'] == $userLogin){

    if($_POST['password'] == $userPasswordLogin){

        $user = new User();
        $user->setEmail($userLogin);
        $user->setPassword($userPasswordLogin);

        session_start();

        $_SESSION['login']= $user->getEmail();
        header("location:add-form.php");

    }else{

        $message = "password incorrecto ";
        require_once("index.php");
    }
}else{

    $message = "nombre del usuario incorrecto";
    require_once("index.php");
}

}else{

    $message = "verifique los datos";
    require_once("index.php");
}
?>
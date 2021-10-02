
<?php


 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
 
 require "Config/Autoload.php";
 require "Config/Config.php";

 use Config\Autoload as Autoload;
 use Config\Router     as Router;
 use Config\Request     as Request;
     
 Autoload::start();

 session_start();

 require_once('Views/header.php');

 Router::Route(new Request());

 require_once(VIEWS_PATH."footer.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lets Work</title>
    <link rel="stylesheet" href="Views/css/bootstrap.min.css">
   
</head>
<body>
    <h1>Hola Mundo </h1>
    <button class="btn btn-secondary">Iniciando</button>
</body>


</html>
<?php

include 'Views/footer.php'

?>
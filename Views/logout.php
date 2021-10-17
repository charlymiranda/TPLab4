<?php 
    session_start();

    session_destroy();

  
    //  action="VIEW_PATH.login.php"
    header('VIEWS_PATH/index.php')
    //header('location:index.php');
?>

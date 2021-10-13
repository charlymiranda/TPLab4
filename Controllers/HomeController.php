<?php
    namespace Controllers;
    use Models\User as User ;

    class HomeController
    {
        public function Index($message = "")
        {
                  
            require_once(VIEWS_PATH."login.php");
        }
        
        public function login ($username, $password){
           
                       
            $userLogin = "user@hot.com";
            $userPasswordLogin ="123456";
            $message = "";
            
            if($username == $userLogin){
            
                if($password == $userPasswordLogin){
            
                    $user = new User();
                    $user->setEmail($userLogin);
                    $user->setPassword($userPasswordLogin);
                    
                              
                    $_SESSION['login']= $user->getEmail();
                   
                    require_once(VIEWS_PATH."student-list.php");
            
                }else{
            
                    $message = "This Password is Incorrect ";
                    require_once(VIEWS_PATH."login.php");
                }
            }else{
            
                $message = "The Email is invalid";
                require_once(VIEWS_PATH."login.php");
            }
        }
    }
?>
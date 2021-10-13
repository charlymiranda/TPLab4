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
           
                       
            $adminLogin = "user@hot.com";
            $userPasswordLogin ="123456";
            $message = "";
                        
            if($username == $adminLogin ){
            
                if($password == $userPasswordLogin ){
            
                    $user = new User();
                    $user->setEmail($adminLogin);
                    $user->setPassword($userPasswordLogin);
                                    
                                                  
                    $_SESSION['login']= $user->getEmail();
                   
                    require_once(VIEWS_PATH."company-add.php");
                                    
                }else{
            
                    $message = "This Password is Incorrect ";
                   // require_once("Views/login.php");
                        $this->index($message);
                }
            }else{
            
                $message = "The Email is invalid";
                //require_once(FRONT_ROOT.VIEWS_PATH."login.php");
                $this->index($message);
            }
        }
       
                                

        }
          
?>
<?php
    namespace Controllers;

    use Models\User as User;
    use Controllers\StudentController as StudentController;
    use Models\Student as Student;
    use DAO\StudentDAO as StudentDAO;


class HomeController

    {

        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO =new StudentDAO;    
        }



        public function Index($message = "")
        {
            require_once(VIEWS_PATH ."login.php");
        }

        public function menuAdmin(){

            require_once (ADMIN_VIEWS ."menu-admin.php");

        }

     

        public function menuStudent(){

            require_once (STUDENT_VIEWS ."menu-student.php");

        }

      

        public function login($email, $password){
           
            if(($email == 'user@hot.com') && ($password == '123456')){
                $user = new User($email);
                $user= new User($password);
                $_SESSION['admin'] = $user;
              
                require_once(ADMIN_VIEWS."menu-admin.php");
            } else {
            
               // $studentController = new StudentController();
                $student = new Student;
                $student = $this->studentDAO->getLoginStudent($email);
                var_dump($student);
                die;
                if($password == $student->getPassword()){
                    $_SESSION['student'] = $student;
    
                    require_once(STUDENT_VIEWS."menu-student.php");
                } else {
                    $invalidEmail = true;
                    require_once(VIEWS_PATH ."login.php");
                }
            }
        }


 
        public function RedirectAdm () {
            require_once(VIEWS_PATH."admin-view.php");
        }
       
        public function Logout()
        {
            session_destroy();
            
            $this->Index();
        }
    }

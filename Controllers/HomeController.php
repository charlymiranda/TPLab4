<?php
    namespace Controllers;

    use Models\User as User;
    use Controllers\StudentController as StudentController;
    use Models\Student as Student;
    use DAO\StudentDAO as StudentDAO;
    use DAO\CareerDAO as CareerDAO;
    use Models\Career as Career;


class HomeController

    {

        private $studentDAO;
        private $student;
        private $careerDAO;
        private $career;

        public function __construct()
        {
            $this->studentDAO =new StudentDAO;    
            $this->student = new Student();
             $this->careerDAO = new CareerDAO;
             $this->career = new Career;
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

                $this->student = $this->studentDAO->getLoginStudent($email);
                $this->career = $this->careerDAO->GetCareerById($this->student->getCareerId());
                
                if($password == $this->student->getPassword()){
                    
                    $_SESSION['student'] = $this->student;
    
                    require_once(STUDENT_VIEWS."student-profile.php");
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

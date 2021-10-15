<?php
    namespace Controllers;

    use Models\User as User;
    use Controllers\StudentController as StudentController;
    use Models\Student as Student;

class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH ."login.php");
        }

        public function login($email){

            if($email == 'user@hot.com'){
                $user = new User($email);
                $_SESSION['admin'] = $user;

                require_once(VIEWS_PATH."student-view.php");
            } else {
                $studentController = new StudentController();
                $student = new Student();
                $student = $studentController->getStudentByMail($email);
    
                if($student != null){
                    $_SESSION['student'] = $student;
    
                    require_once(VIEWS_PATH."student-view.php");
                } else {
                    $invalidEmail = true;
                    require_once(VIEWS_PATH ."index.php");
                }
            }
        }

        public function RedirectAdm () {
            require_once(VIEWS_PATH."admin-firstpage.php");
        }


        public function Logout()
        {
            session_destroy();
            
            $this->Index();
        }
    }

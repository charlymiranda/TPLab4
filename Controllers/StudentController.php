<?php
    namespace Controllers;
    include('Views/header.php');
    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;
    use DAO\CompanyDAO as CompanyDAO;
    use DAO\CareerDAO as CareerDAO;
    use Models\Company as Company;
    use Utils\Utils;
//use Views\validateSession as validateSession;
    use validateSession;

class StudentController
    {
        private $studentDAO;
        private $companyDAO;
        private $careerDAO;
        private $studentList = array();
        private $careerList = array();
        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
            $this->companyDAO = new CompanyDAO();
            $this->careerDAO = new CareerDAO();
        }

        public function ShowListView()
        {
            Utils::checkSession();
            $this->studentList = $this->studentDAO->GetAll();
            $this->careerList = $this->careerDAO->GetAll();
            //var_dump($studentList);
            require_once(VIEWS_PATH."student-list.php");
        }


        public function getStudentByMail($email){
            $student = $this->studentDAO->getStudentByMail($email);
            return $student;
        }




        public function checkIfActive(){

            return false;
        }


        public function ShowAddView()
        {

            require_once(VIEWS_PATH."student-add.php");
        }




       /* public function Add($firstName, $lastName)
        {
            $student = new Student();
            $student->setfirstName($firstName);
            $student->setLastName($lastName);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }*/

        public function viewInformation($studentMail)
        {
            try{
                //Ingresa BD
                $student = $this->studentD->Search($studentMail);
            }
            catch(\PDOException $th){
                throw $th;
            }
            return $student;
        }     

        
    }
?>
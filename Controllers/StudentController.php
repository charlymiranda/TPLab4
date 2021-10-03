<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentD;

        public function __construct()
        {
            $this->studentD = new StudentDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentD->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        /*public function Add($recordId, $firstName, $lastName)
        {
            $student = new Student();
            $student->setRecordId($recordId);
            $student->setfirstName($firstName);
            $student->setLastName($lastName);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }*/

        public function viewInformation($studentMail)
        {
            try{
                //Ingresa BD
                $student = $this->studentD->SearchByEmail($studentMail);
            }
            catch(\PDOException $th){
                throw $th;
            }
            return $student;
        }

        
    }
?>
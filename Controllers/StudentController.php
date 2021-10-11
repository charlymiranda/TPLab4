<?php
    namespace Controllers;

    use DAO\StudentDAO as StudentDAO;
    use Models\Student as Student;

    class StudentController
    {
        private $studentDAO;

        public function __construct()
        {
            $this->studentDAO = new StudentDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }

        public function ShowListView()
        {
            $studentList = $this->studentDAO->GetAll();

            require_once(VIEWS_PATH."student-list.php");
        }

        public function consumeFromApi(){

            $apiStudent = curl_init('https://utn-students-api.herokuapp.com/api/Student');
            curl_setopt($apiStudent, CURLOPT_HTTPHEADER, array(API_KEY));
            curl_setopt($apiStudent, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($apiStudent);

            $arrayToDecode = json_decode($response, true);
        
        /*$opciones = array(
            'http'=>array(
                'method'=>'GET',
                'header'=>API_KEY)
            );
            $response1=file_get_contents('https://utn-students-api.herokuapp.com/api/Student');*/

        }


        public function Add($firstName, $lastName)
        {
            $student = new Student();
            $student->setfirstName($firstName);
            $student->setLastName($lastName);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }
    }
?>
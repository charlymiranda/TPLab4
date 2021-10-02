<?php
    namespace DAO;

    use interfaces\Idaos as IDaos;
    use Models\Student as Student;

    class StudentDAO implements IDaos
    {
        private $studentList = array();

        public function Add($student)
        {
            
            // Guardo como string la consulta sql utilizando como values, marcadores de parámetros con nombre (:name) o signos de interrogación (?)
            // por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada
            $sql="INSERT INTO students (wayToPay, idPurchase,  fecha, numberAcount) VALUES (:wayToPay,:idPurchase,:fecha, :numberAcount);";
            $sql = "INSERT INTO students (firstName, lastName, dni, fileNumber, gender, birthDate, phoneNumber, active)
                     VALUES (:firstName, :lastName, :dni, :fileNumber, :gender, :birthDate, :phoneNumber, :active);";
            $parameters["firstName"]=$student->();
            $parameters['lastName']=$student->();
            $parameters['dni']=$student->();
            $parameters['gender']=$student->();
            $parameters['birthDate']=$student->();
            $parameters['phoneNumber']=$student->();
            $parameters['active']=$student->();

            
            try {
                $this->connection= Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }

        public function GetAll()
        {
            $this->RetrieveData();

            return $this->studentList;
        }
        public function Delete($objet){

        }
        public function Update($objet, $toFind){

        }
        public function Search($objet){

        }

       /* private function SaveData()
        {
            $arrayToEncode = array();

            foreach($this->studentList as $student)
            {
                $valuesArray["recordId"] = $student->getRecordId();
                $valuesArray["firstName"] = $student->getFirstName();
                $valuesArray["lastName"] = $student->getLastName();

                array_push($arrayToEncode, $valuesArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            
            file_put_contents('Data/students.json', $jsonContent);
        }*/

        private function RetrieveData()
        {
            $this->studentList = array();

            if(file_exists('Data/students.json'))
            {
                $jsonContent = file_get_contents('Data/students.json');

                $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valuesArray)
                {
                    $student = new Student();
                    $student->setRecordId($valuesArray["recordId"]);
                    $student->setFirstName($valuesArray["firstName"]);
                    $student->setLastName($valuesArray["lastName"]);

                    array_push($this->studentList, $student);
                }
            }
        }
    }
?>
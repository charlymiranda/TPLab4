<?php
    namespace DAO;

    use interfaces\Idaos as IDaos;
    use Models\Student as Student;

    use DAO\Connection as Connection;
use PDOException;

class StudentDAO implements IDaos
    {
        private $connection;

        private $studentList = array();

<<<<<<< HEAD
=======
        

        public function GetAll()
        {   
            $sql = "SELECT * FROM student";
            try{
                $this->connection = Connection::getInstance();
                $this->studentList = $this->connection->execute($sql);
            }catch(\PDOException $exeption){
                throw $exeption;
            }

            if(!empty($studentList)){
                return $this->mapear($studentList);
            }else{
                return false;
            }

        }

>>>>>>> master
        public function Add($student)
        {
            
          $sql = "INSERT INTO students (firstName, lastName, dni, fileNumber, gender, birthDate, phoneNumber, active)
                     VALUES (:firstName, :lastName, :dni, :fileNumber, :gender, :birthDate, :phoneNumber, :active);";
            $parameters["firstName"]=$student->getFirstName();
            $parameters['lastName']=$student->getLastName();
            $parameters['dni']=$student->getDni();
            $parameters['gender']=$student->getGender();
            $parameters['birthDate']=$student->getBirthDate();
            $parameters['phoneNumber']=$student->getPhoneNumber();
            $parameters['active']=true;

            
            try {
                $this->connection= Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            } catch (\PDOException $ex) {
                throw $ex;
            }
        }

<<<<<<< HEAD
        public function GetAll()
        {   
            $sql = "SELECT * FROM student";
            try{
                $this->connection = Connection::getInstance();
                $this->studentList = $this->connection->execute($sql);
            }catch(\PDOException $exeption){
                throw $exeption;
            }

            if(!empty($studentList)){
                return $this->mapear($studentList);
            }else{
                return false;
            }

        }

=======
>>>>>>> master
        public function Delete($idToDelete){

            $sql = "DELETE FROM students WHERE studentId=:studentId";
            $parameters['studentId']=$idToDelete;
            try{
                $this->connection = Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            }catch(\PDOException $exeption){
                throw $exeption;
            }

        }

        public function Update($student, $toFind){
            $sql = "UPDATE students set careerId=:careerId, firstName=:firstName, lastName=:lastName, dni=:dni, fileNumber=:fileNumber, 
                     gender=:gender, birthDate=:birthDate, email=:email, phoneNumber=:phoneNumber WHERE studentId= '$toFind';";

            $parameters["firstName"]=$student->getFirstName();
            $parameters['lastName']=$student->getLastName();
            $parameters['dni']=$student->getDni();
            $parameters['gender']=$student->getGender();
            $parameters['birthDate']=$student->getBirthDate();
            $parameters['phoneNumber']=$student->getPhoneNumber();
            $parameters['active']=$student->getActive();

            try{
                $this->connection=Connection::getInstance();
                return $this->connection->executeNonQuery($sql, $parameters);
            }catch(\PDOException $exeption){
                throw $exeption;
            }
                     
        }

<<<<<<< HEAD
        public function SearchByEmail($email){
=======
        public function Search($email){
>>>>>>> master
            $sql = "SELECT * FROM students WHERE email=:email";
            $parameters['email']=$email;
            try{
                $this->connection = Connection::getInstance();
                $result=$this->connection->execute($sql, $parameters);

            }catch(\PDOException $exeption){
                throw $exeption;
            }

            if(!empty($result)){
                return $this->mapear($result);
            }else{
                return false;
            }

        }


        private function mapear($studentList){

            $studentList=is_array($studentList)?$studentList:[];

            $studentArray=array_map(function($pos){
                $newStudent = new Student($pos['careerId'],$pos['firstName'],$pos['lastName'],$pos['dni'],$pos['fileNumber'],$pos['gender'],
                                        $pos['birthDate'],$pos['email'],$pos['phoneNumber']);//crear student
                $newStudent->setstudentId($pos['studentId']);

                return $newStudent;
            }, $studentList);
            return count($studentArray)>1? $studentArray:$studentArray['0'];
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

      /*  private function RetrieveData()
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
        }*/
    }
?>
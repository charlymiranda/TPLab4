<?php
    namespace DAO;

    use interfaces\Idaos as IDaos;
    use Models\Student as Student;
    use DAO\IStudentDAO as IStudentDAO;

    use DAO\Connection as Connection;
use PDOException;

class StudentDAO implements IStudentDAO
    {
        private $connection;

        private $studentList = array();

        
        public function GetAll()
        {   
           $this->consumeFromApi();
           return $this->studentList;
            
        }

        private function consumeFromApi(){
            $this->studentList = array();

            $options = array(
                'http' => array(
                  'method'=>"GET",
                  'header'=>"x-api-key: " . API_KEY)
           );
    

            $context = stream_context_create($options);

            $response = file_get_contents(API_URL .'Student', false, $context);

           $arrayToDecode = json_decode($response, true);

            foreach($arrayToDecode as $value){
                
                $student = new Student;

                $student->setstudentId($value['studentId']);
                $student->setCarrerId($value['careerId']);
                $student->setFirstName($value['firstName']);
                $student->setLastName($value['lastName']);
                $student->setDni($value['dni']);
                $student->setFileNumber($value['fileNumber']);
                $student->setGender($value['gender']);
                $student->setBirthDate($value['birthDate']);
                $student->setEmail($value['email']);
                $student->setPhoneNumber($value['phoneNumber']);
                $student->setActive($value['active']);

                array_push($this->studentList, $student);
            }
        }

        public function getStudentByMail($email)
        {
            $this->consumeFromApi();

            foreach ($this->studentList as $student) {
                if ($student->getEmail() == $email){
                    return $student;
                }
            }
    
            return null;
            
        }

     /*   public function Add($student)
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

        public function Search($email){
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

        }*/


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
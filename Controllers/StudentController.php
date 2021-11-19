<?php

namespace Controllers;

use DAO\StudentDAO as StudentDAO;
use Models\Student as Student;
use DAO\CompanyDAO as CompanyDAO;
use DAO\CareerDAO as CareerDAO;
use Models\Career as Career;
use Models\Company as Company;
use DAO\JobOfferDAO as JobOfferDAO;
use Utils\Utils;
use DAO\StudentByJobOfferDAO as StudentByJobOfferDAO;
//use Views\validateSession as validateSession;
use validateSession;

class StudentController
{
    private $studentDAO;
    private $companyDAO;
    private $careerDAO;
    private $studentList = array();
    private $careerList = array();
    private $student;
    private $career;
    private $jobOfferDAO;
    private $company;
    private $studendByJobOfferDAO;
    public function __construct()
    {
        $this->studentDAO = new StudentDAO();
        $this->companyDAO = new CompanyDAO();
        $this->careerDAO = new CareerDAO();
        $this->student= new Student;
        $this->career = new Career();
        $this->jobOfferDAO = new JobOfferDAO();
        $this->company = new Company();
        $this->studentByJobOfferDAO = new StudentByJobOfferDAO();
    }
    
    public function ShowStudentRegistration()
    {

        require_once(VIEWS_PATH . "registration.php");
    }

    public function ShowListView()
    {
        Utils::checkSession();
        $this->studentList = $this->studentDAO->GetAll();
        $this->careerList = $this->careerDAO->GetAllWhitInactives();
        //var_dump($studentList);
        require_once(VIEWS_PATH . "student-list.php");
    }


    public function getStudentByMail($email)
    {
        // Utils::checkSession();

        if ($email != null) {
            $this->student = $this->studentDAO->getLoginStudent($email);
            //$this->student = $this->studentDAO->getLoginStudent($email);
            $this->career = $this->careerDAO->getCareerStudent($this->student);

            require_once(STUDENT_VIEWS . "student-profile.php");
        } else {
            $message = "This mail doesn't exist";
            require_once(VIEWS_PATH . "registration.php");
        }
    }


    public function studentValidation($email)
    {
        $student = $this->studentDAO->getStudentByMail($email);
       
        if ($student != null) {
            
            // $career = $this->careerDAO->getCareerStudent($student);

            require_once(VIEWS_PATH . "student-registration.php");
        } else {
            $message = "This mail doesn't exist";
            require_once(VIEWS_PATH . "login.php");
        }
    }

    public function studentRegistration($email, $password, $confirmPass)
    {
        if ($password == $confirmPass) {
            $student = new Student;
            $student = $this->studentDAO->getStudentByMail($email);
            $student->setPassword($password);

            $this->studentDAO->Add($student);
            
            echo "<script> if(confirm('Student Registered. Please Login'));</script>";
            require_once(VIEWS_PATH . "login.php");
        }
    }



    public function ShowJobsViews($search = "")
    {
        if ($search == "") {
            $this->jobOfferList = $this->jobOfferDAO->getAllJobOffer();
            $this->careerList = $this->careerDAO->GetAll();
            $this->companiesList = $this->companyDAO->GetAll();
          
                require_once(STUDENT_VIEWS . "company-job-offers-students.php");
         
        } else {
            $search = strtolower($search);
            $filteredOffers = array();
            $this->jobOfferList = $this->jobOfferDAO->getAllJobOffer();
            $this->careerList = $this->careerDAO->GetAll();
            $this->companiesList = $this->companyDao->GetAll();
            
            foreach ($this->jobOfferList as $jobOffer) {
                $jobOfferName = strtolower($jobOffer->getName());

                if (Utils::strStartsWith($jobOfferName, $search)) {
                    array_push($filteredOffers, $jobOffer);
                }
            }
            $this->jobOffersList = $filteredOffers;
            require_once(ADMIN_VIEWS . "company-job-offers-admin.php");
        }
    }

    public function checkActive($studentId, $jobOfferId){
        $offers = $this->StudentByJobOfferDAO->getByJobOfferId($jobOfferId);
        $answer = false; 

        if($offers != null){
            foreach($offers as $jobOffer){
                if($jobOffer['studentId'] == $studentId){
                    $answer = true;
                }
            }
        }
        return $answer;
    }


    public function checkIfActive()
    {

        return false;
    }


    public function ShowAddView()
    {

        require_once(VIEWS_PATH . "student-add.php");
    }

   
    public function viewInformation($studentMail)
    {
        try {
            //Ingresa BD
            $student = $this->studentD->Search($studentMail);
        } catch (\PDOException $th) {
            throw $th;
        }
        return $student;
    }
}

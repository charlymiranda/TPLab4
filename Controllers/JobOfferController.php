<?php

namespace Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Models\JobOffer as JobOffer;
use DAO\JobOfferDAO as JobOfferDAO;
use Models\JobPosition as JobPosition;
use DAO\JobPositionDAO as JobPositionDAO;
use Models\Career as Career;
use DAO\CareerDAO as CareerDAO;
use DAO\StudentByJobOfferDAO as StudentByJobOfferDao;
use Models\StudentByJobOffer as StudentByJobOffer;
use Models\Student as Student;
use DAO\StudentDAO as StudentDAO;

use DAO\IJobOfferDAO as IJobOfferDAO;
use DAO\IJobPossitionDAO as IJobPositionDAO;
use DAO\CompanyDAO as CompanyDAO;
use Models\Company as Company;
use Utils\Utils as Utils;
use DAO\JobOfferByCompanyDAO as JobOfferByCompanyDAO;
use Models\JobOfferByCompany as JobOfferByCompany;
use \PDOException as PDOException;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

class JobOfferController
{
    private $jobPositionDAO;
    private $jobPositionList;
    private $jobOfferDAO;
    private $jobOfferList;
    private $careerDAO;
    private $careerList;
    private $jobOfferByCompany;
    private $companiesList;
    private $companyDao;
    private $company;
    private $jobOffer;
    private $expiredJobOffers;
    private $studentByJobOfferdao;
    private $studentByJobOffer;
    private $student;
    private $stundentDao;
    private $studentXJobOfferDao;


    public function __construct()
    {
        $this->jobPositionDAO = new JobPositionDAO();
        $this->jobPositionList = array();
        $this->jobOfferDAO = new JobOfferDAO();
        $this->careerDAO = new CareerDAO();
        $this->careerList = array();
        $this->jobOfferByCompany = new JobOfferByCompany();
        $this->companiesList = array();
        $this->companyDao = new CompanyDAO;
        $this->company = new Company();
        $this->jobOffer = new JobOffer();
        $this->jobOfferList = array();
        $this->expiredJobOffers = array();
        $this->studentByJobOfferdao = new StudentByJobOfferDao();
        $this->studentByJobOffer = new StudentByJobOffer();
        $this->student = new Student();
        $this->stundentDao = new StudentDAO();
        $this->studentXJobOfferDao = new StudentByJobOfferDAO();
    }

    public function RedirectAddJobForm()
    {
        Utils::checkAdminSession();
        $this->companiesList = $this->companyDao->GetAll();
        $this->careerList = $this->careerDAO->GetAllActive();
        $this->jobPositionList = $this->jobPositionDAO->getAllJobpositions();
        require_once(ADMIN_VIEWS . "jobOffer-add.php");
    }


    public function ShowJobOfferAddView($message = "")
    {
        require_once(ADMIN_VIEWS . "jobOffer-add.php");
    }

    public function ShowListCompanyList($message = "")
    {
        $this->companiesList = $this->companyDao->GetAll();
        require_once(ADMIN_VIEWS . "company-delete.php");
    }

    public function showAddjobOfferForCompany($companyId)
    {

        $this->company = $this->companyDao->Search($companyId);
        $this->careerList = $this->careerDAO->GetAllActive();
        $this->jobPositionList = $this->jobPositionDAO->getAllJobpositions();

        require_once(ADMIN_VIEWS . "jobOffer-add.php");
    }

    public function showJobOfferView()
    {
        Utils::checkSession();
        $this->jobOfferList = $this->jobOfferDAO->GetAllJobOffer();

        require_once(VIEWS_PATH . "jobOffer-list.php");    ///Falta crear
    }

    public function getJobOfferById($id)
    {
        Utils::checkSession();
        $jobOffer = $this->jobOfferDAO->searchJobOfferById($id);

        require_once(VIEWS_PATH . "jobOffer-view.php");      ///Falta crear
    }
    public function getJobOfferByName($search)
    {
        Utils::checkSession();
        $this->jobOfferList = $this->jobOfferDAO->searchJobOfferByName($search);

        if ($search != null) {
            $search = strtolower($search);
            $filteredJobOffer = array();

            foreach ($this->jobOfferList as $jobOffer) {
                $jobOfferName = strtolower($jobOffer->getName());

                if (Utils::strStartsWith($jobOfferName, $search)) {
                    array_push($filteredJobOffer, $jobOffer);
                }
            }
            require_once(VIEWS_PATH . "job-offers-by-company.php");      ///Falta crear
        } else {
            echo "Aca";
        }
    }


    public function showModifyJobOfferView($jobOfferId)
    {
        $this->jobOffer = $this->jobOfferDAO->searchJobOfferById($jobOfferId);
        $this->careerList = $this->careerDAO->GetAllActive();
        $this->jobPositionList = $this->jobPositionDAO->getAllJobpositions();
        require_once(ADMIN_VIEWS . "modify-jobOffer-view.php");
    }

    public function addJobOffer($companyId, $name, $startDay, $deadline, $description, $salary, $careerId, $jobPositionId)
    {
        //Utils::checkAdminSession();

        $jobOffer = new JobOffer();
        $jobOffer->setCompanyId($companyId);
        $jobOffer->setName($name);
        $jobOffer->setStartDay($startDay);
        $jobOffer->setDeadLine($deadline);
        $jobOffer->setActive(true);
        $jobOffer->setDescription($description);
        $jobOffer->setSalary($salary);
        $jobOffer->setCareerId($careerId);
        $jobOffer->setJobPositionId($jobPositionId);

        $this->jobOfferDAO->addJobOffer($jobOffer);

        $this->ShowListCompanyList("The job offer had been loaded successfully");
    }

    public function updateJobOffer($jobOfferId, $name, $startDay, $deadline, $description, $salary, $careerId, $jobPositionId)
    {
        Utils::checkSession();

        $jobOffer = new JobOffer();
        $jobOffer->setJobOfferId($jobOfferId);
        $jobOffer->setName($name);
        $jobOffer->setStartDay($startDay);
        $jobOffer->setDeadLine($deadline);
        $jobOffer->setDescription($description);
        $jobOffer->setSalary($salary);
        $jobOffer->setCareerId($careerId);
        $jobOffer->setJobPositionId($jobPositionId);

        $this->jobOfferDAO->updateJobOffer($jobOffer);

        $this->ShowJobOfferAddView("The job offer had been updated successfully");
    }

    public function deleteJobOffer($jobOfferId)
    {

        $this->jobOfferDAO->deleteJobOffer($jobOfferId);

        $this->ShowjobOfferAddView("The job offer had been deleted successfully");
    }

    ///Filtro de job offers
    public function jobOffersForJobPosition($positionId)
    {
        Utils::checkSession();
        //    $this->jobOfferList = $this->jobOfferDAO->GetAllJobPosition();
        $results = array();

        foreach ($this->jobOfferList as $offer) {
            if ($offer['jobPositionId'] == $positionId) {
                array_push($results, $offer);
            }
        }
        return $results;
    }

    public function addStudentToAJobOffer($jobOfferId, $studentId)
    {
        $controlScritpt = 1;        //Que carajo pasa aca??
        try {
            $this->studentXJobOfferDao->addStudentToAJobOffer($jobOfferId, $studentId);
            $this->companiesList = $this->companyDao->GetAll();
        } catch (PDOException $ex) {
            $controlScritpt = 1;
            $message = 'error en la base';
            require_once(STUDENT_VIEWS . "student-profile.php");
        }
        $message = "student added to a job offer";
        require_once(STUDENT_VIEWS . "menu-student.php");
    }

    public function showJobsOffersViewByCareer($careerId)
    {
    }


    public function showJobsOffersViewByCompany($companyId)
    {

        $this->jobOfferList = $this->jobOfferDAO->getJobOfferByCompany($companyId);
        $this->company = $this->companyDao->Search($companyId);
        require_once(VIEWS_PATH . "job-offers-by-company.php");
    }

    public function ShowJobsViews($search = "")
    {
        if ($search == "") {
            if ($_SESSION['admin']) {               //PENSAR COMO SOLUCIONAR. CONTROLADORAS SEPARADAS??
                $this->jobOfferList = $this->jobOfferDAO->getAllJobOffer();
                $this->careerList = $this->careerDAO->GetAll();
                $this->companiesList = $this->companyDao->GetAll();

                require_once(ADMIN_VIEWS . "company-job-offers-admin.php");
            }else{
                $this->jobOfferList = $this->jobOfferDAO->getAllJobOffer();
                $this->careerList = $this->careerDAO->GetAll();
                $this->companiesList = $this->companyDao->GetAll();
                require_once(STUDENT_VIEWS . "company-job-offers-students.php");
            }
        } else {
            $search = strtolower($search);
            $filteredOffers = array();
            foreach ($this->jobOfferDAO->getAllJobOffer() as $jobOffer) {
                $jobOffer = strtolower($jobOffer->getName());

                if (Utils::strStartsWith($jobOffer, $search)) {
                    array_push($filteredOffers, $jobOffer);
                }
            }
            $this->jobOffersList = $filteredOffers;
            require_once(ADMIN_VIEWS . "company-job-offers-admin.php");
        }
    }

    public function finishedJobOffers()
    {
        Utils::checkAdminSession();
        $this->jobOfferList = $this->jobOfferDAO->getAllJobOffer();
        $this->careerList = $this->careerDAO->getAll();
        $this->companiesList = $this->companyDao->getAll();
        // $this->expiredJobOffers = array();
        if (!empty($this->jobOfferList)) {
            foreach ($this->jobOfferList as $jobOfferEach) {
                if (strtotime($jobOfferEach->getDeadLine()) < strtotime(date("Y-m-d H:i:00", time()))) {
                    array_push($this->expiredJobOffers, $jobOfferEach);
                }
            }       ///De donde es la fecha que devuelve???
        }

        require_once(ADMIN_VIEWS . "expired-job-offers.php");
    }

    public function notificationByEmail($jobOfferId)
    {
        Utils::checkAdminSession();

        //buscar por el id de la job  offer, del id sacas el id del estudiante, con el id del stud buscas el mail.
        $this->jobOfferList = $this->studentByJobOfferdao->getByJobOfferId($jobOfferId);

        $to = array();
        $subject = "Gratitude";
        $message = "We appreciate your application to the job. The job offer had expired";

        if ($this->jobOfferList != null) {
            foreach ($this->jobOfferList as $jobOffer) {
                $studentId = $jobOffer['studentId'];
                $student = new Student();
                $student = $this->stundentDao->getStudentById($studentId);


                $studentsEmail = $student->getEmail();
                array_push($to, $studentsEmail);
            }
        }

        foreach ($to as $forEmail) {
            $hola = $this->sendMail($forEmail["email"], $subject, $message);
            var_dump($hola);
        }

        require_once(VIEWS_PATH . "job-offers-by-company.php");
    }

    public function sendMail($recipientMail, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'utnmdp2021@gmail.com';
            $mail->Password   = '123456..!';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            //Recipients
            $mail->setFrom('utnmdp2021@gmail.com', 'Lets Work');
            $mail->addAddress($recipientMail);
            $mail->addCC("jamartinezverneri@gmail.com");

            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->send();
            return 'Message has been sent';
        } catch (Exception $e) {
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

<?php
    namespace Controllers;

    use Models\JobOffer as JobOffer;
    use DAO\JobOfferDAO as JobOfferDAO;
    use Models\JobPosition as JobPosition;
    use DAO\JobPositionDAO as JobPositionDAO;
    use Models\Career as Career;
    use DAO\CareerDAO as CareerDAO;

    use DAO\IJobOfferDAO as IJobOfferDAO;
    use DAO\IJobPossitionDAO as IJobPositionDAO;
    use DAO\CompanyDAO as CompanyDAO;
    use Utils\Utils as Utils; 
    use DAO\JobOfferByCompanyDAO as JobOfferByCompanyDAO;
    use Models\JobOfferByCompany as JobOfferByCompany;
    use \PDOException as PDOException;

    class JobOfferController{
        private $jobPositionDAO;
        private $jobPositionList;
        private $jobOfferDAO;
        private $jobOfferList = array();
        private $careerDAO;
        private $careerList;
        private $jobOfferByCompanyDAO;
        private $jobOfferByCompany;
        private $companiesList;
        private $companyDao;


        public function __construct()
        {
            $this->jobPositionDAO = new JobPositionDAO();
            $this->jobPositionList = array();
            $this->jobOfferDAO = new JobOfferDAO();
            $this->careerDAO = new CareerDAO();
            $this->careerList = array();
            $this->jobOfferByCompanyDAO = new JobOfferByCompanyDAO();
            $this->jobOfferByCompany = new JobOfferByCompany();
            $this->companiesList = array();
            $this->companyDao = new CompanyDAO;

        }

        public function RedirectAddJobForm()
        {
            Utils::checkAdminSession();
            $this->companiesList = $this->companyDao->GetAll();
            $this->careerList = $this->careerDAO->GetAllActive();
            $this->jobPositionList= $this->jobPositionDAO->getAllJobpositions();
            require_once(ADMIN_VIEWS . "jobOffer-add.php");
        }
    

        public function ShowJobOfferAddView($message = "")
        {
            require_once(ADMIN_VIEWS . "jobOffer-add.php");
        }

        public function showJobOfferView(){
            Utils::checkSession();
            $this->jobOfferList = $this->jobOfferDAO->GetAllJobOffer();
            
            require_once(VIEWS_PATH."jobOffer-list.php");    ///Falta crear
        }

        public function getJobOfferById($id){
            Utils::checkSession();
            $jobOffer = $this->jobOfferDAO->searchJobOfferById($id);
        
            require_once(VIEWS_PATH . "jobOffer-view.php");      ///Falta crear
        }
        public function getJobOfferByName($id){
            Utils::checkSession();
            $jobOffer = $this->jobOfferDAO->searchJobOfferById($id);
        
            require_once(VIEWS_PATH . "jobOffer-view.php");      ///Falta crear
        }

        public function addJobOffer($name, $startDay, $deadline, $description, $salary, $careerId, $jobPositionId){
            //Utils::checkAdminSession();

            $jobOffer = new JobOffer();
        
            $jobOffer->setName($name);
            $jobOffer->setStartDay($startDay);
            $jobOffer->setDeadLine($deadline);
            $jobOffer->setActive(true);
            $jobOffer->setDescription($description);
            $jobOffer->setSalary($salary);
            $jobOffer->setCareerId($careerId);
            $jobOffer->setCompanyId(4);
            $jobOffer->setCareerId($careerId);
            $jobOffer->setJobPositionId($jobPositionId);
          
            $this->jobOfferDAO->addJobOffer($jobOffer);

            $this->ShowjobOfferAddView("The job offer had been loaded successfully");
        }

        public function updateJobOffer($jobOfferId, $startDay, $deadLine, $active, $jobPositionId)
        {
            Utils::checkSession();

            $jobOffer = new JobOffer();
            $jobOffer->setJobOfferId($jobOfferId);
            $jobOffer->setStartDay($startDay);
            $jobOffer->setDeadLine($deadLine);
            $jobOffer->setActive($active);
            $jobOffer->setJobPositionId($jobPositionId);

            $this->JobOfferDAO->update($jobOffer);

            $this->ShowJobOfferAddView("The job offer had been updated successfully");
        }

        public function deleteJobOffer($jobOfferId)
        {

            $this->jobOfferDAO->deleteJobOffer($jobOfferId);

            $this->ShowjobOfferAddView("The job offer had been deleted successfully");
        }

        ///Filtro de job offers
      public function jobOffersForJobPosition($positionId){
            Utils::checkSession();
        //    $this->jobOfferList = $this->jobOfferDAO->GetAllJobPosition();
            $results = array();

            foreach($this->jobOfferList as $offer){
                if($offer['jobPositionId'] == $positionId){
                    array_push($results, $offer); 
                }
            }
            return $results;
        }

        public function addStudentToAJobOffer($jobOfferId, $studentId){
            $controlScritpt=1;
            try{
                $this->jobOfferDAO->addStudentToAJobOffer($jobOfferId, $studentId);

            }catch(PDOException $ex){
                $controlScritpt=1;
                $message='error en la base';
                require_once(ADMIN_VIEWS . "jobOffer-add.php");
            }
            $message = "student added to a job offer";
            require_once(ADMIN_VIEWS . "jobOffer-add.php");
        }
        


        public function showJobsOffersViewByCareer($careerId){
        
            

              


        }



        public function showJobsOffersViewByCompany($companyId){
        
            


        }

        public function ShowJobsViews($search = "")
        {
            if ($search == "") {
                Utils::checkSession();
                $this->jobOfferList = $this->jobOfferDAO->getAllJobOffer();
               
                require_once(ADMIN_VIEWS . "company-job-offers.php");
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
                require_once(ADMIN_VIEWS . "company-job-offers.php");
            }
        }

      
    

    }

  



?>
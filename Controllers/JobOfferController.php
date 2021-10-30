<?php
    namespace Controllers;

    use Models\JobOffer as JobOffer;
    use Models\JobPosition as JobPosition;
    use DAO\JobOfferDAO as JobOfferDAO;
    use DAO\IJobOfferDAO as IJobOfferDAO;
    use DAO\JobPositionDAO as JobPositionDAO;
    use DAO\IJobPossitionDAO as IJobPositionDAO;
    use Utils\Utils as Utils;

    class JobOfferController{
        private $jobPositionDAO;
        private $jobOfferDAO;
        private $jobOfferList = array();

        public function __construct()
        {
            $this->jobPositionDAO = new JobPositionDAO();
            $this->jobOfferDAO = new JobOfferDAO();
        }

        public function ShowJobOfferAddView($message = "")
        {
            require_once(VIEWS_PATH . "jobOffer-add.php");
        }

        public function showJobOfferView(){
            Utils::checkSession();
            $this->jobOfferList = $this->jobOfferDAO->GetAllJobOffer();
            
            require_once(VIEWS_PATH."jobOffer-list.php");    ///Falta crear
        }

        public function getJobOfferId($id){
            Utils::checkSession();
            $jobOffer = $this->jobOfferDAO->SearchJobOffer($id);
        
            require_once(VIEWS_PATH . "jobOffer-view.php");      ///Falta crear
        }

        public function addJobOffer($jobOfferId, $startDay, $deadLine, $active, $jobPositionId){
            Utils::checkAdminSession();

            $jobOffer = new JobOffer();
            $jobOffer->setJobOfferId($jobOfferId);
            $jobOffer->setStartDay($startDay);
            $jobOffer->setDeadLine($deadLine);
            $jobOffer->setActive($active);
            $jobOffer->setJobPossitionId($jobPositionId);

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
            $jobOffer->setJobPossitionId($jobPositionId);

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
            //$this->jobOfferList = $this->jobOfferDAO->GetAllJobPosition();
            $results = array();

            foreach($this->jobOfferList as $offer){
                if($offer['jobPositionId'] == $positionId){
                    array_push($results, $offer); 
                }
            }
            return $results;
        }

        public function jobsOffersByCompany($companyId){
            

        }

    }

?>
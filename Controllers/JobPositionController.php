<?php
    namespace Controllers;

    use Models\JobPosition as JobPosition;
    use DAO\JobPossitionDAO as JobPossitionDAO;
    use DAO\IJobPossitionDAO as IJobPositionDAO;
    use Utils\Utils as Utils;

    class JobPositionController{
        private $jobPositionDAO;
        private $jobsList;

        public function __construct()
        {
            $this->jobPositionDAO = new JobPositionDAO();
        }

        public function ShowJobPositionAddView($message = "")
        {
            require_once(VIEWS_PATH . "jobPosition-add.php");
        }

        public function showJobPositionView(){
            Utils::checkSession();
            $this->jobsList = $this->jobpositionDAO->GetAll();
            
            require_once(VIEWS_PATH."jobPosition-list.php");    ///Falta crear
        }

        public function getJobPositionId($id){
            Utils::checkSession();
            $jobPosition = $this->jobPositionDAO->Search($id);
        
            require_once(VIEWS_PATH . "jobPosition-view.php");      ///Falta crear
        }

        public function addJobPosition($jobId, $careerId, $descrpition){
            Utils::checkAdminSession();

            $jobPosition = new JobPosition();
            $jobPosition->setJobPossitionId($jobId);
            $jobPosition->setCareerId($careerId);
            $jobPosition->setDescription($descrpition);

            $this->jobPositionDAO->addJobPosition($jobPosition);

            $this->ShowjobPositionAddView("The job position had been loaded successfully");
        }

        public function updateJobPosition($jobId, $careerId, $descrpition)
        {
            Utils::checkSession();
            $jobPosition = new JobPosition();

            $jobPosition = new JobPosition();
            $jobPosition->setJobPossitionId($jobId);
            $jobPosition->setCareerId($careerId);
            $jobPosition->setDescription($descrpition);

            $this->JobPositionDAO->update($jobPosition);

            $this->ShowJobPositionAddView("The job position had been updated successfully");
        }

        public function deleteJobPosition($jobPositionId)
        {

            $this->jobPositionDAO->delete($jobPositionId);

            $this->ShowjobPositionAddView("The job position had been deleted successfully");
        }
    }
?>
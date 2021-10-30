<?php
    namespace Models;
        use Models\JobPosition as JobPosition;
    class JobOffer{
        private $jobOfferId;
        private $startDay;
        private $deadLine;
        private $active;
        private $jobPossitionId;
        private $companyId;

        public function __construct()
        {
                
        }
            

        /**
         * Get the value of jobOfferId
         */ 
        public function getJobOfferId()
        {
                return $this->jobOfferId;
        }


        public function setJobOfferId($jobOfferId)
        {
                $this->jobOfferId = $jobOfferId;

                return $this;
        }

        /**
         * Get the value of startDay
         */ 
        public function getStartDay()
        {
                return $this->startDay;
        }

        /**
         * Set the value of startDay
         *
         * @return  self
         */ 
        public function setStartDay($startDay)
        {
                $this->startDay = $startDay;

                return $this;
        }

        /**
         * Get the value of deadLine
         */ 
        public function getDeadLine()
        {
                return $this->deadLine;
        }

        /**
         * Set the value of deadLine
         *
         * @return  self
         */ 
        public function setDeadLine($deadLine)
        {
                $this->deadLine = $deadLine;

                return $this;
        }

        /**
         * Get the value of active
         */ 
        public function getActive()
        {
                return $this->active;
        }

        /**
         * Set the value of active
         *
         * @return  self
         */ 
        public function setActive($active)
        {
                $this->active = $active;

                return $this;
        }

  


        /**
         * Get the value of jobPossitionId
         */ 
        public function getJobPossitionId()
        {
                return $this->jobPossitionId;
        }

        /**
         * Set the value of jobPossitionId
         *
         * @return  self
         */ 
        public function setJobPossitionId($jobPossitionId)
        {
                $this->jobPossitionId = $jobPossitionId;

                return $this;
        }

        /**
         * Get the value of companyId
         */ 
        public function getCompanyId()
        {
                return $this->companyId;
        }

        /**
         * Set the value of companyId
         *
         * @return  self
         */ 
        public function setCompanyId($companyId)
        {
                $this->companyId = $companyId;

                return $this;
        }
}
?>
<?php
    namespace Models;

    class JobOffer{
        private $jobOfferId;
        private $startDay;
        private $deadLine;
        private $active;
        private $jobPossitionId;

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
         * Get the value of JobPossitionId
         */ 
        public function getjobPositionid()
        {
                return $this->jobPositionid;
        }
          /**
         * Set the value of jobPositionid
         *
         * @return  self
         */ 
        public function setJobPositionid($jobPositionid)
        {
                $this->jobPositionid = $jobPositionid;

                return $this;
        }

}
?>
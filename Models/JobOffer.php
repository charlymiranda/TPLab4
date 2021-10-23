<?php
    namespace Models;

    class JobOffer{

        private $jobOfferId;
        private $startDay;
        private $deadline;
        private $active;
        private $jobPositionid;

        public function __construct()
        {
            
        }

        /**
         * Get the value of dateTime
         */ 
        public function getstartDay()
        {
                return $this->startDay;
        }

        /**
         * Set the value of dateTime
         *
         * @return  self
         */ 
        public function setstartDay($startDay)
        {
                $this->dateTime = $startDay;

                return $this;
        }

        /**
         * Get the value of deadline
         */ 
        public function getdeadline()
        {
                return $this->deadline;
        }

        /**
         * Set the value of deadline
         *
         * @return  self
         */ 
        public function setdeadline($deadline)
        {
                $this->deadline = $deadline;

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
         * Get the value of idJobPossition
         */ 
        public function getjobPositionid()
        {
                return $this->jobPositionid;
        }

        /**
         * Get the value of jobOfferId
         */ 
        public function getJobOfferId()
        {
                return $this->jobOfferId;
        }

    }
?>
<?php
    namespace Models;

    class JobOffer{
        private $dateTime;
        private $limitDate;
        private $active;

        public function __construct()
        {
            
        }

        /**
         * Get the value of dateTime
         */ 
        public function getDateTime()
        {
                return $this->dateTime;
        }

        /**
         * Set the value of dateTime
         *
         * @return  self
         */ 
        public function setDateTime($dateTime)
        {
                $this->dateTime = $dateTime;

                return $this;
        }

        /**
         * Get the value of limitDate
         */ 
        public function getLimitDate()
        {
                return $this->limitDate;
        }

        /**
         * Set the value of limitDate
         *
         * @return  self
         */ 
        public function setLimitDate($limitDate)
        {
                $this->limitDate = $limitDate;

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
    }
?>
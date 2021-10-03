<?php
    namespace Models;

    class Company{

        private $companyId;
        private $name;
        private $yearFoundation;
        private $city;
        private $description;
        private $logo;
        private $email;
        private $phoneNumber;

        public function __construct($companyId,$name, $yearFoundation, $city, $description,$logo, $email, $phoneNumber)
        {
            $this->companyId=$companyId;
            $this->name=$name;
            $this->yearFoundation=$yearFoundation;
            $this->city= $city;
            $this->description= $description;
            $this->logo=$logo;
            $this->email= $email;
            $this->phoneNumber= $phoneNumber;               
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of yearFoundation
         */ 
        public function getYearFoundation()
        {
                return $this->yearFoundation;
        }

        /**
         * Set the value of yearFoundation
         *
         * @return  self
         */ 
        public function setYearFoundation($yearFoundation)
        {
                $this->yearFoundation = $yearFoundation;

                return $this;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
                return $this->city;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
                $this->city = $city;

                return $this;
        }

        /**
         * Get the value of description
         */ 
        public function getDescription()
        {
                return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of logo
         */ 
        public function getLogo()
        {
                return $this->logo;
        }

        /**
         * Set the value of logo
         *
         * @return  self
         */ 
        public function setLogo($logo)
        {
                $this->logo = $logo;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

                return $this;
        }

        /**
         * Get the value of phoneNumber
         */ 
        public function getPhoneNumber()
        {
                return $this->phoneNumber;
        }

        /**
         * Set the value of phoneNumber
         *
         * @return  self
         */ 
        public function setPhoneNumber($phoneNumber)
        {
                $this->phoneNumber = $phoneNumber;

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
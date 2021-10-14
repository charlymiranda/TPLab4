<?php
    namespace Models;

    class Career{

        private $careerId;
        private $description;
        private $name;
        private $active;

        public function __construct()
   {
   
      
 
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
         * Get the value of careerId
         */ 
        public function getCareerId()
        {
                return $this->careerId;
        }

        /**
         * Set the value of careerId
         *
         * @return  self
         */ 
        public function setCareerId($careerId)
        {
                $this->careerId = $careerId;

                return $this;
        }
    }
    ?>
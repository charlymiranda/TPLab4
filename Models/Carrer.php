<?php
    namespace Models;

    class Carrer{

        private $carrerId;
        private $description;
        private $name;
        private $active;

        public function __construct($description,$name, $active)
   {
   
      
      $this->description=$description;
      $this->name=$name;
      $this->active=$active;     
   }

   
      /**
       * Get the value of carrerId
       */ 
      public function getCarrerId()
      {
            return $this->carrerId;
      }

      /**
       * Set the value of carrerId
       *
       * @return  self
       */ 
      public function setCarrerId($carrerId)
      {
            $this->carrerId = $carrerId;

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

    }
    ?>
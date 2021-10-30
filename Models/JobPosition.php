<?php
    namespace Models;

    class JobPosition
    {
       private $jobPossitionId;
       private $careerId;
       private $description;

       public function __construct()
       {
           
       }

       public function setDescription($description){
            $this->description = $description;
       }

       public function getDescription(){
           return $this->description;
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

 
    }
?>
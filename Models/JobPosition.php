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
        * Get the value of jobPossitionId
        */ 
       public function getJobPossitionId()
       {
              return $this->jobPossitionId;
       }
    }
?>
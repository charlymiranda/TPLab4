<?php

namespace Models;

class PostulantesByJobOffer
{
    private $postulantesByJobOfferId; 
    private $studentId; 
    private $jobOfferId;   
    private $active;
   

    /**
     * Get the value of postulantesByJobOfferId
     */ 
    public function getPostulantesByJobOfferId()
    {
        return $this->postulantesByJobOfferId;
    }

    /**
     * Set the value of postulantesByJobOfferId
     *
     * @return  self
     */ 
    public function setPostulantesByJobOfferId($postulantesByJobOfferId)
    {
        $this->postulantesByJobOfferId = $postulantesByJobOfferId;

        return $this;
    }

    /**
     * Get the value of studentId
     */ 
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set the value of studentId
     *
     * @return  self
     */ 
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;

        return $this;
    }

    /**
     * Get the value of jobOfferId
     */ 
    public function getJobOfferId()
    {
        return $this->jobOfferId;
    }

    /**
     * Set the value of jobOfferId
     *
     * @return  self
     */ 
    public function setJobOfferId($jobOfferId)
    {
        $this->jobOfferId = $jobOfferId;

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

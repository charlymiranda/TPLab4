<?php

namespace Models;

class JobOfferByCompany
{
    private $jobOfferByCompanyId;
    private $companyId;
    private $jobOfferId;
    private $jobPossitionId;
    private $active;
    private $careerId;

    /**
     * Get the value of jobOfferByCompanyId
     */ 
    public function getJobOfferByCompanyId()
    {
        return $this->jobOfferByCompanyId;
    }

    /**
     * Set the value of jobOfferByCompanyId
     *
     * @return  self
     */ 
    public function setJobOfferByCompanyId($jobOfferByCompanyId)
    {
        $this->jobOfferByCompanyId = $jobOfferByCompanyId;

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
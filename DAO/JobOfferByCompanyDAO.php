<?php

namespace DAO;

use DAO\IJobOfferByCompanyDAO as IJobOfferByCompanyDAO;
use Models\JobOfferByCompany as JobOfferByCompany;
use Models\Student as Student;
use DAO\IStudentDAO as IStudentDAO;

use DAO\Connection as Connection;
use \PDOException AS PDOException;

class JobOfferByCompanyDAO implements IJobOfferByCompanyDAO
{
    private $jobOffersList;
    private $jobOfferByCompany;
    private $jobOfferByCareer;
    private $connection;
    
    
    public function __construct()
    {
        $this->jobOffersList = array();
        $this->jobOfferByCompany = array();
        $this->jobOfferByCareer = array();


    }

    function getAllJobOfferByCompany($companyId){

        $sql = "SELECT * FROM job_offer_x_company WHERE companyId=:companyId AND active=:active";
        $parameters['companyId'] = $companyId;
        $parameters['active'] = true;

        try {
            $this->connection = Connection::getInstance();
            $this->jobOffers= $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }

        if($this->jobOffersList != null){
            return $this->retrieveData();
        }else{
            return false;
        }

    }

    function getAllJobOfferByCareer($carrerId)
    {
        $sql = "SELECT * FROM job_offer_x_company WHERE carrerId=:carrerId";
        $parameters['companyId'] = $carrerId;

        try {
            $this->connection = Connection::getInstance();
            $this->jobOffers= $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }

        if($this->jobOffersList != null){
            return $this->retrieveData();
        }else{
            return false;
        }
    }
    
    private function retrieveData()
    {
        $listToReturn = array();

        foreach ($this->jobOffersList as $values) {
            $jobOffer = new JobOfferByCompany();
            $jobOffer->setCompanyId($values['companyId']);
            $jobOffer->setJobOfferId($values['jobOfferId']);
            $jobOffer->setJobPossitionId($values['jobPositionId']);
            
            array_push($listToReturn, $jobOffer);
        }
        return  $listToReturn;
    }


}

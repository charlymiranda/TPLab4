<?php

namespace DAO;

use Models\JobOffer as JobOffer;
use DAO\IJobOfferDAO as IJobOfferDAO;
use DAO\Connection as Connection;


class JobOfferDAO implements IJobOfferDAO
{
    private $jobOfferList = array();
    private $connection;
    private $tablestartDay = "jo_bOffer";

    public function GetAll()
    {

        $sql = "SELECT * FROM " . $this->tablestartDay;

        try {
            $this->connection = Connection::getInstance();
            $this->jobOfferList = $this->connection->execute($sql);
        } catch (\PDOException $exeption) {
            throw $exeption;
        }
        if (!empty($this->jobOfferList)) {
            return $this->retrieveData();
        } else {
            return false;
        }
    }

    public function Delete($jobOfferId)//no deberia tener id??
    {
        $sql = "DELETE FROM job_Offer WHERE job_Positionid=:job_Positionid";
        $parameters['job_offer_id'] = $jobOfferId;

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }

    public function AddJobOfferDAO(JobOffer $jobOffer)
    {
        $sql = "INSERT INTO job_offer(startDay, deadline, active) 
                VALUES(:startDay, :deadline, :active);";

        $parameters['startDay'] = $jobOffer->getstartDay();
        $parameters['deadline'] = $jobOffer->getdeadline();
        $parameters['active'] = $jobOffer->getactive();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exeption) {
            throw $exeption;
        }
    }

    public function Update(JobOffer $jobOffer)
    {
        $sql = "UPDATE job_offer SET startDay=:startDay, deadline=:deadline, active=:active;";

        $parameters['JobOfferId'] = $jobOffer->getjobOfferId();
        $parameters['startDay'] = $jobOffer->getstartDay();
        $parameters['deadline'] = $jobOffer->getdeadline();
        $parameters['active'] = $jobOffer->getactive();
    
        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }

    private function retrieveData()
    {
           $listToReturn = array();

            foreach ($this->jobOfferList as $values) {
                $jobOffer = new JobOffer();
                $jobOffer->setstartDay
                ($values['startDay
                ']);
                $jobOffer->setdeadLine
    ($values['deadLine']);
                $jobOffer->setActive($values['active']);
               // $jobOffer->setjobPositionId(($values['jobPositionId']));
              
                array_push($listToReturn, $jobOffer);
            }
            return  $listToReturn;
        
    }
}

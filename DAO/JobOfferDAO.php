<?php

namespace DAO;

use Models\JobOffer as JobOffer;
use DAO\IJobOfferDAO as IJobOfferDAO;
use DAO\Connection as Connection;


class JobOfferDAO implements IJobOfferDAO
{
    private $jobOfferList = array();
    private $connection;
    private $tableName = "jobOffer";

    public function GetAll()
    {

        $sql = "SELECT * FROM " . $this->tableName;

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

    public function Delete($idJobOffer)//no deberia tener id??
    {
        $sql = "DELETE FROM jobOffer WHERE idJobOffer=:idJobOffer";
        $parameters['idJobOffer'] = $idJobOffer;

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
                $jobOffer->setDateTime($values['dateTime']);
                $jobOffer->setLimitDate($values['limitDate']);
                $jobOffer->setActive($values['active']);
                $jobOffer->setidJobPossition(($values['idJobPossition']));
              
                array_push($listToReturn, $jobOffer);
            }
            return  $listToReturn;
        
    }
}

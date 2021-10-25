<?php

namespace DAO;

use Models\JobPosition as JobPosition;
use DAO\IJobPositionDAO as IJobPositionDAO;
use DAO\Connection as Connection;

class JobPositionDAO implements IJobPositionDAO
{

    private $jobPositionList = array();
    private $conection;
    private $tableName = "jobpositions";

    public function getAllJobpositions()
    {

        $sql = "SELECT * FROM " . $this->tableName;

        try {
            $this->connection = Connection::getInstance();
            $this->jobpositions = $this->connection->execute($sql);
        } catch (\PDOException $exeption) {
            throw $exeption;
        }
        if (!empty($this->jobpositions)) {
            return $this->retrieveDataJobPosition();
        } else {
            return false;
        }
    }

    public function deleteJobPosition($jobPosition)
    {
        $sql = "DELETE FROM jobposition WHERE jobPositionId=:jobPositionId";
        $parameters['jobPositionId'] = $jobPosition;

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }
    
    public function addJobPosition(JobPosition $jobPosition)
    {   //hay que poner el carrerId?
        $sql = "INSERT INTO jobposition(descriptio)  
                VALUES(:description);";

        $parameters['description'] = $jobPosition->getDescription();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exeption) {
            throw $exeption;
        }
    }

    public function updateJobPosition(JobPosition $jobPosition)
    {
        $sql = "UPDATE jobposition SET description=:description;";

        $parameters['description'] = $jobPosition->getDescription();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }

    public function searchJobPosition($jobPosition)
    {
        $sql = "SELECT * FROM jobposition WHERE jobPositionId=:jobPositionId";
        $parameters['jobPositionId'] = $jobPosition;

        try {
            $this->connection = Connection::getInstance();
            $jobPositionList = $this->connection->execute($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }
        //var_dump($companiesList);
      //  die;
        if (!empty($jobPositionList)) {
            return $this->retrieveDataJobPosition();
        } else {
            return false;
        }
    }

     private function retrieveDataJobPosition()
    {
        $listToReturn = array();

        foreach ($this->jobPositionList as $values) {
            $jobPosition = new JobPosition();
            $jobPosition->setJobPossitionId($values['jobPositionId']);
            $jobPosition->setDescription($values['description']);
            $jobPosition->setCareerId($values['carrerId']);

            array_push($listToReturn, $jobPosition);
        }
        return  $listToReturn;
    }

   
}

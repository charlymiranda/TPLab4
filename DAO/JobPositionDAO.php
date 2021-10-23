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

    public function GetAllJobpositions()
    {

        $sql = "SELECT * FROM " . $this->tableName;

        try {
            $this->connection = Connection::getInstance();
            $this->jobpositions = $this->connection->execute($sql);
        } catch (\PDOException $exeption) {
            throw $exeption;
        }
        if (!empty($this->jobpositions)) {
            return $this->retrieveData();
        } else {
            return false;
        }
    }

    

    /* private function retrieveData()
    {
        $listToReturn = array();

        foreach ($this->jobPositionList as $values) {
            $jobPosition = new JobPosition();
            $jobPosition->setstartDay($values['startDay']);
            $jobPosition->setdeadLine($values['deadLine']);
            $jobPosition->setActive($values['active']);

            array_push($listToReturn, $jobPosition);
        }
        return  $listToReturn;
    }*/
}

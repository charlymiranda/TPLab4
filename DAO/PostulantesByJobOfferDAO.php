<?php

namespace DAO;

use DAO\IPostulantesByJobOfferDAO as IPostulantesByJobOfferDAO;
use Models\PostulantesByJobOffer as PostulantesByJobOffer;

use DAO\Connection as Connection;
use \PDOException AS PDOException;

class PostulantesByJobOfferDAO implements IPostulantesByJobOfferDAO
{
    private $postulantesByJobOfferList;  
    private $connection;
    
    
    public function __construct()
    {       
        $this->postulantesByJobOfferList = array();       
    }

    function getAllPostulantesByJobOffer($jobOfferId)
    {
        $sql = "SELECT * FROM postulante_por_jobo_offer WHERE jobOfferId=:jobOfferId AND active=:active";
        $parameters['jobOfferId'] = $jobOfferId;
        $parameters['active'] = true;

        try {
            $this->connection = Connection::getInstance();
            $this->jobOffers= $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }

        if($this->postulantesByJobOfferList != null){
            return $this->retrieveData();
        }else{
            return false;
        }    }

      
    private function retrieveData()
        {
            $listToReturn = array();
    
            foreach ($this->postulantesByJobOfferList as $values) {
                $postulantesByJobOffer = new PostulantesByJobOffer();
                $postulantesByJobOffer->setStudentId($values['studentId']);
                $postulantesByJobOffer->setJobOfferId($values['jobOfferId']);            
                
                array_push($listToReturn, $postulantesByJobOffer);
            }
            return  $listToReturn;
        }   
    
}

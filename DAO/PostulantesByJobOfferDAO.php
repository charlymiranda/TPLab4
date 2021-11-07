<?php

namespace DAO;

use DAO\IPostulantesByJobOfferDAO as IPostulantesByJobOfferDAO;
use Models\PostulantesByJobOffer as PostulantesByJobOffer;

use DAO\Connection as Connection;
use \PDOException AS PDOException;

class PostulantesByJobOfferDAO implements IPostulantesByJobOfferDAO
{
    private $studentList;    
    private $connection;
    
    
    public function __construct()
    {
        $this->jobOffersList = array();
        $this->jobOfferByCompany = array();
        $this->jobOfferByCareer = array();
    }
}
<?php


namespace DAO;

use COM;
use interfaces\Idaos as IDaos;
use DAO\ICompanyDAO as ICompanyDAO;
use Models\Company as Company;
use DAO\Connection as Connection;

class CompanyDAO implements ICompanyDAO{

        private $connection;
    
        public function GetAll(){

        $sql = "SELECT * FROM companies";

        try{
            $this->connection = Connection::getInstance();
            $companiesList = $this->connection->execute($sql);

        }catch(\PDOException $exeption){
            throw $exeption;
        }

        if(!empty($companiesList)){
            return $this->mapear($companiesList);
        }else{
            return false;
        }

    }
    public function Add(Company $company){
        $sql = "INSERT INTO companies(name, yearFoundation, city, description, email, phoneNumber) 
                VALUES(:name, :yearFoundation, :city, :description, :email, :phoneNumber);";

        $parameters['name']=$company->getName();
        $parameters['yearFoundation']=$company->getYearFoundation();
        $parameters['city']=$company->getCity();
        $parameters['description']=$company->getDescription();
       // $parameters['logo']=$company->getLogo();
        $parameters['email']=$company->getEmail();
        $parameters['phoneNumber']=$company->getPhoneNumber();

        try{
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        }catch(\PDOException $exeption){
            throw $exeption;
        }
    }

    public function Delete($idToDelete){
        $sql = "DELETE FROM companies WHERE compnayId=:companyId";
        $parameters['companyId']=$idToDelete;

        try{
            $this->connection=Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        }catch(\PDOException $exception){
            throw $exception;
        }
    }

    public function Update(Company $company){
        $sql = "UPDATE campanies SET name=:name, yearFoundation=:yearFoundation, city=:city, description=:description, logo=:logo, email=:email, phoneNumber=:phoneNumber WHERE companyId= :companyId;";

        $parameters['companyId']=$company->getCompanyId();
        $parameters['name']=$company->getName();
        $parameters['yearFoundation']=$company->getYearFoundation();
        $parameters['city']=$company->getCity();
        $parameters['description']=$company->getDescription();
        $parameters['logo']=$company->getLogo();
        $parameters['email']=$company->getEmail();
        $parameters['phoneNumber']=$company->getPhoneNumber();

        try{
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        }catch(\PDOException $exception){
            throw $exception;
        }
    }


    public function Search($companyName){
        $sql = "SELECT * FROM companies WHERE name=:name";
        $parameters['name']=$companyName;

        try{
            $this->connection = Connection::getInstance();
            $result = $this->connection->execute($sql, $parameters);
        }catch(\PDOException $exception){
            throw $exception;
        }

        if(!empty($result)){
            return $this->mapear($result);
        }else{
            return false;
        }
    }

    private function mapear($companiesList){
        $companiesList=is_array($companiesList)?$companiesList:[];
        $companiesArray=array_map(function($pos){
            $newCompany= new Company($pos['name'], $pos['yearFoundation'], $pos['city'], $pos['description'], $pos['logo'], $pos['email'], $pos['phoneNumber']);
            $newCompany->setCompanyId($pos['companyId']);
            return $newCompany;
        }, $companiesList);
        return count($companiesArray)>=0? $companiesArray:$companiesArray['0'];
    }
}
?>

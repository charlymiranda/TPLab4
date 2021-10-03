<?php


namespace DAO;

use COM;
use interfaces\Idaos as IDaos;
use Models\Company as Company;
use DAO\Connection as Connection;

class CompanyDAO implements IDaos
{
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
    public function Add($company){
        $sql = "INSERT INTO companies(name, yearFoundation, city, description, logo, email, phoneNumber) 
                VALUES(:name, :yearFoundation, :city, :description, :logo, :email, :phoneNumber);";

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
        }catch(\PDOException $exeption){
            throw $exeption;
        }
    }

    public function Delete($idToDelete)
    {
    }
    public function Update($objet, $toFind)
    {
    }
    public function Search($companyName)
    {
    }

    private function mapear($companiesList){
        $companiesList=is_array($companiesList)?$companiesList:[];
        $companiesArray=array_map(function($pos){
            $newCompany= new Company($pos['name'], $pos['yearFoundation'], $pos['city'], $pos['description'], $pos['logo'], $pos['email'], $pos['phoneNumber']);
            $newCompany->setCompanyId($pos['companyId']);
            return $newCompany;
        }, $companiesList);
        return count($companiesArray)>1? $companiesArray:$companiesArray['0'];
    }
}
?>

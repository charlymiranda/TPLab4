<?php


namespace DAO;

use COM;
use interfaces\Idaos as IDaos;
use DAO\ICompanyDAO as ICompanyDAO;
use Models\Company as Company;
use DAO\Connection as Connection;

class CompanyDAO implements ICompanyDAO
{
    private $companiesList = array();
    private $connection;
    private $tableName = "companies";

    public function GetAll()
    {

        $sql = "SELECT * FROM ".$this->tableName;

        try {
            $this->connection = Connection::getInstance();
            $this->companiesList = $this->connection->execute($sql);
           
        } catch (\PDOException $exeption) {
            throw $exeption;
        }

        if (!empty($this->companiesList)) {
            return $this->retrieveData();
        } else {
            return false;
        }
    }

    public function AddCompany(Company $company)
    {
        $sql = "INSERT INTO companies(name, yearFoundation, city, description, email, phoneNumber) 
                VALUES(:name, :yearFoundation, :city, :description, :email, :phoneNumber);";

        $parameters['name'] = $company->getName();
        $parameters['yearFoundation'] = $company->getYearFoundation();
        $parameters['city'] = $company->getCity();
        $parameters['description'] = $company->getDescription();
        // $parameters['logo']=$company->getLogo();
        $parameters['email'] = $company->getEmail();
        $parameters['phoneNumber'] = $company->getPhoneNumber();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exeption) {
            throw $exeption;
        }
    }

    public function Delete($companyId)
    {
        $sql = "DELETE FROM companies WHERE companyId=:companyId";
        $parameters['companyId'] = $companyId;

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }

    public function Update(Company $company)
    {
        $sql = "UPDATE campanies SET name=:name, yearFoundation=:yearFoundation, city=:city, description=:description, logo=:logo, email=:email, phoneNumber=:phoneNumber WHERE companyId= :companyId;";

        $parameters['companyId'] = $company->getCompanyId();
        $parameters['name'] = $company->getName();
        $parameters['yearFoundation'] = $company->getYearFoundation();
        $parameters['city'] = $company->getCity();
        $parameters['description'] = $company->getDescription();
        $parameters['logo'] = $company->getLogo();
        $parameters['email'] = $company->getEmail();
        $parameters['phoneNumber'] = $company->getPhoneNumber();

        try {
            $this->connection = Connection::getInstance();
            return $this->connection->executeNonQuery($sql, $parameters);
        } catch (\PDOException $exception) {
            throw $exception;
        }
    }


   public function Search($companyId)
    {
        $sql = "SELECT * FROM companies WHERE companyId=:companyId";
        $parameters['companyId'] = $companyId;

        try {
            $this->connection = Connection::getInstance();
            $this->companiesList = $this->connection->execute($sql, $parameters);

        } catch (\PDOException $exception) {
            throw $exception;
        }
     
        if (!empty($this->companiesList)) {
            return $this->retrieveData();
        } else {
            return false;
        }
    }

    private function retrieveData()
    {
           $listToReturn = array();

            foreach ($this->companiesList as $values) {
                $company = new Company();
                $company->setCompanyId($values['companyId']);
                $company->setName($values['name']);
                $company->setYearFoundation($values['yearFoundation']);
                $company->setDescription(($values['description']));
                $company->setCity($values['city']);
               // $company->setLogo($values['logo']);
                $company->setEmail($values['email']);
                $company->setPhoneNumber($values['phoneNumber']);
                array_push($listToReturn, $company);
            }
            return  $listToReturn;
        
    }
    /*
    private function mapear($companiesList)
    {
        $companiesList = is_array($companiesList) ? $companiesList : [];
        $companiesArray = array_map(function ($pos) {
            $newCompany = new Company($pos['name'], $pos['yearFoundation'], $pos['city'], $pos['description'], $pos['logo'], $pos['email'], $pos['phoneNumber']);
            $newCompany->setCompanyId($pos['companyId']);
            return $newCompany;
        }, $companiesList);
        return count($companiesArray) >= 0 ? $companiesArray : $companiesArray['0'];
    }
*/

}

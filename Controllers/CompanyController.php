<?php

namespace Controllers;

use DAO\CompanyDAO as CompanyDAO;
use Models\Administrator;
use Models\Company as Company;
use Utils\Utils as Utils;

class CompanyController
{
    private $companyDAO;
    private $companiesList = array();
    private $company;


    public function __construct()
    {
        $this->companyDAO = new CompanyDAO();
    }

    public function ShowAddView()
    {
        require_once(ADMIN_VIEWS . "company-add.php");
    }


  /*  public function ShowSingleView()
    {
        require_once(VIEWS_PATH . "show-companyAddCompany.php");
    }*/
    
    public function RedirectAddForm()
    {
        Utils::checkAdminSession();
        require_once(ADMIN_VIEWS . "company-add.php");
    }

    
    public function RedirectDeleteForm()
    {
        Utils::checkAdminSession();
        $this->companiesList = $this->companyDAO->GetAll();
        require_once(VIEWS_PATH . "company-delete.php");

    }

    public function ShowSingleCompany($companyId)
    {
        Utils::checkSession();
        $this->company = $this->companyDAO->Search($companyId);
        
        require_once(VIEWS_PATH . "student-company-view.php");
        
    }

    public function ShowCompaniesViews($search = "")
    {
        if ($search == "") {
            Utils::checkSession();
            $this->companiesList = $this->companyDAO->GetAll();
            // var_dump($this->companiesList);
            // die;
            //var_dump($this->companiesList);
            //  $this->ShowCompaniesViews();   
            require_once(ADMIN_VIEWS . "company-delete.php");
        } else {
            $search = strtolower($search);
            $filteredCompanies = array();
            foreach ($this->companyDAO->getAll() as $company) {
                $companyName = strtolower($company->getName());

                if (Utils::strStartsWith($companyName, $search)) {
                    array_push($filteredCompanies, $company);
                }
            }
            $this->companiesList = $filteredCompanies;
            require_once(ADMIN_VIEWS . "company-delete.php");
        }
    }

    public function ShowModifyCompany($companyId)
    {   
        $this->company = $this->companyDAO->Search($companyId);
        require_once(ADMIN_VIEWS . "company-modify.php");
    }


    public function ListCompanies()
    {
        Utils::checkSession();
        $this->companiesList = $this->companyDAO->GetAll();
        //var_dump($this->companiesList);
        $this->ShowCompaniesViews();
    }



   


    public function AddCompany($name, $yearFoundation, $city, $description, $email, $phoneNumber)
    {
        Utils::checkSession();
        $company = new Company();
        $company->setName($name);
        $company->setYearFoundation($yearFoundation);
        $company->setCity($city);
        $company->setDescription($description);
        $company->setEmail($email);
        $company->setPhoneNumber($phoneNumber);

        $this->companyDAO->AddCompany($company);

        $this->ShowAddView();
    }

 
    public function deleteCompany($companyId)
    {

        $this->companyDAO->delete($companyId);

        $this->ShowCompaniesViews();
    }

    public function jobOffersForCompanies($companyName)
    {
        $companiesList = $this->companyDAO->GetAll();
        $jobs = null;

        foreach ($companiesList as $company) {
            if ($company->getName() == $companyName) {
                $jobs = $company;
            }
        }
    }

    /*public function searchCompanyByName($name){
            $company = $this->companyDAO->search($name);

            $this->ShowSingleView();
        }*/
}
<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;
    use Utils\Utils as Utils;

class CompanyController
    {
        private $companyDAO;
        private $companiesList = array();


        public function __construct()
        {
            $this->companyDAO = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."company-add.php");
        }
        

        public function ShowSingleView()
        {
            require_once(VIEWS_PATH."show-companyAddCompany.php");
        }

        public function ShowCompaniesViews(){
            Utils::checkSession();
            $this->companiesList = $this->companyDAO->GetAll();
            //var_dump($this->companiesList);
          //  $this->ShowCompaniesViews();   
            require_once(VIEWS_PATH."company-list.php");     
        }

        public function RedirectAddForm()
        {
            Utils::checkAdminSession();
            require_once(VIEWS_PATH . "company-add.php");
        }
    

        public function ListCompanies()
        {
            Utils::checkSession();
            $this->companiesList = $this->companyDAO->GetAll();
            //var_dump($this->companiesList);
            $this->ShowCompaniesViews();    
        }


        public function AddCompany($name, $yearFoundation,$city, $description,$email,$phoneNumber)
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

        public function updateCompany($companyId, $name, $yearFoundation,$city, $description,$email,$phoneNumber){
            Utils::checkSession();
            $company = new Company();

            $company->setCompanyId($companyId);
            $company->setName($name);
            $company->setYearFoundation($yearFoundation);
            $company->setCity($city);
            $company->setDescription($description);
            $company->setEmail($email);
            $company->setPhoneNumber($phoneNumber);

            $this->CompanyDAO->update($company);

            $this->ShowAddView();
        }

        public function deleteCompany($companyId){

            $this->companyDAO->delete($companyId);

            $this->ShowAddView();
        }

        public function jobOffersForCompanies($companyName){
            $companiesList = $this->companyDAO->GetAll();
            $jobs= null;

            foreach($companiesList as $company){
                if($company->getName() == $companyName){
                    $jobs = $company;
                }
            }
        }

        /*public function searchCompanyByName($name){
            $company = $this->companyDAO->search($name);

            $this->ShowSingleView();
        }*/
    }
?>
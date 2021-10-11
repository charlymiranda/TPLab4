<?php
    namespace Controllers;

    use DAO\CompanyDAO as CompanyDAO;
    use Models\Company as Company;

    class CompanyController
    {
        private $companyD;

        public function __construct()
        {
            $this->companyD = new CompanyDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."company-add.php");
        }

        public function ListCompanies()
        {
            $companiesList = $this->companyD->GetAll();

            ///require_once(VIEWS_PATH."company-list.php");     ///Que hace?
        }

        public function AddCompany($name, $yearFoundation,$city, $description,$email,$phoneNumber)
        {
            $company = new Company();
            $company->setName($name);
            $company->setYearFoundation($yearFoundation);
            $company->setCity($city);
            $company->setDescription($description);
            $company->setEmail($email);
            $company->setPhoneNumber($phoneNumber);

            $this->CompanyDAO->Add($company);

            $this->ShowAddView();
        }

        public function jobOffersForCompanies($companyName){
            $companiesList = $this->companyD->GetAll();
            $jobs= null;

            foreach($companiesList as $company){
                if($company->getName() == $companyName){
                    $jobs = $company;
                }
            }
        }
    }
?>
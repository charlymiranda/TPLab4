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

        /*public function ShowAddView()
        {
            require_once(VIEWS_PATH."student-add.php");
        }*/

        public function ListCompanies()
        {
            $companiesList = $this->companyD->GetAll();

            ///require_once(VIEWS_PATH."company-list.php");     ///Que hace?
        }

        /*public function Add($recordId, $firstName, $lastName)
        {
            $student = new Student();
            $student->setRecordId($recordId);
            $student->setfirstName($firstName);
            $student->setLastName($lastName);

            $this->studentDAO->Add($student);

            $this->ShowAddView();
        }*/

        public function jobOffersForCompanies($companyName){
            $companiesList = $this->companyD->GetAll();
            $jobs= null;

            foreach($companiesList as $company){
                if($company->getName() == $companyName){
                    $jobs = $company
                }
            }
        }
    }
?>
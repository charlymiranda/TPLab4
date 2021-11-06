<?php 


namespace Controllers;

use Models\UserCompany as UserCompany;
use DAO\UserCompanyDAO as userCompanyDAO;
use DAO\CompanyDAO as CompanyDAO;
use Models\Company as Company;
use Utils\Utils;

class UserCompanyController{

    private $userCompany;

    public function __construct()
    {
        
    }

    public function ShowUserCompanyRegistrationView(){

        require_once(USERCOMPANY_VIEWS."usercompany-register.php");
       }

       public function userCompanyRegistration($firstName, $lastName, $dni, $email, $phoneNumber, $passwword, $confirmPassword){



       }



    


}

?>
<?php
    namespace DAO;

    use Models\Student as Student;

    interface IJobOfferByCompanyDAO
    {
      
        function getAllJobOfferByCompany($companyId);
        function getAllJobOfferByCareer($carrerId);
        
    }
?>
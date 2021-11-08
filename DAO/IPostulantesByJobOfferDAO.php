<?php
    namespace DAO;

    use Models\Student as Student;

    interface IPostulantesByJobOfferDAO
    {
        function getAllPostulantesByJobOffer($jobOfferId);
   
        
    }
?>
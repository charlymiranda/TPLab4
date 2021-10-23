<?php

    namespace DAO;

    use Models\JobOffer as JobOffer;

    interface IJobOfferDAO 
    {
         public function GetAll();
        public function Delete($idJobOffer);
        public function AddJobOfferDAO(JobOffer $jobOffer);
        public function Update(JobOffer $jobOffer);
       
    }

?> 
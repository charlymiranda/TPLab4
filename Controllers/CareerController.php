<?php
    namespace Controllers;

    use DAO\CareerDAO as CareerDAO;
    use Models\Career as Career;
    use Utils\Utils as Utils;

    class CareerController{
        private $careerDAO;
        private $careersList = array();

        public function __construct()
        {
            $this->careerDAO = new CareerDAO();
        }

        public function ShowSingleCareer($careerId)
        {
            Utils::checkSession();
            $this->career = $this->careerDAO->GetCareerById($careerId);
        
            require_once(VIEWS_PATH . "student-company-view.php");  ///Modificar
        
        }

        public function ListCareers()
        {
            Utils::checkSession();
            $this->careerList = $this->careerDAO->GetAll();
            //var_dump($this->companiesList);
            require_once(VIEWS_PATH . "student-list.php");  ///Modificar
        }

    }
?>
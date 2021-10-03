<?php


namespace DAO;

use Models\Administrator as Admin;
use interfaces\Idaos as IDaos;
use DAO\Connection as Connection;

class AdministratorDao implements IDaos{

    private $connection;

    public function GetAll(){
        $sql = "SELECT * FROM administrators";
        try{
            $this->connection = Connection::getInstance();
            $administratorList = $this->connection->execute($sql);
        }catch(\PDOException $exception){
            throw $exception;
        }
        if(!empty($administratorList)){
            return $this->mapear($administratorList);
        }
        
    }


    public function Add($objet){

    }
    public function Delete($idToDelete){}
    public function Update($objet, $toFind){}//sera el dato por el cual busque al objeto que quiero actualizar
    public function Search($objet){}//en cada calse que la implemente, este objeto sera el atributo
    //por el cual se quiere buscar un registro

    private function mapear($administratorList){
        $administratorList = is_array($administratorList)? $administratorList:[];
        $adminList = array_map(function($pos){
            $newAdmin = new Admin($pos['firstName'], $pos['lastName'], $pos['dni'], $pos['gender'], $pos['birthDate'], $pos['email'], $pos['phoneNumber']);
            $newAdmin->setadministratorId($pos['administratorId']);
            return $newAdmin;
        },$administratorList);
        return count($administratorList)>1? $administratorList:$administratorList['0'];
    }
}

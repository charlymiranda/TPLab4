<?php
namespace interfaces;
interface Idaos
{
    public function GetAll();
    public function Add($objet);
    public function Delete($idToDelete);
    public function Update($objet, $toFind);//sera el dato por el cual busque al objeto que quiero actualizar
    public function SearchByEmail($objet);//en cada calse que la implemente, este objeto sera el atributo
    //por el cual se quiere buscar un registro
}
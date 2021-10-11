<?php
namespace interfaces;
interface Idaos
{
    public function GetAll();
    public function Delete($idToDelete);
    public function Search($idTosearch);
}
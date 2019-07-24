<?php
require_once("model/Config.php");

class Companies extends Config
{
    public $Id;
    private $Dbh;

    public function __construct()
    {
        $this->Dbh = $this->connexion();
    }

    public function getListCompagnies()
    {
        $sql = 'SELECT * FROM airline_company';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

}

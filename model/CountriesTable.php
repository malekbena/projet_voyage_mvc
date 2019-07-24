<?php
require_once("model/Config.php");

class Countries extends Config
{

    private $Id;
    private $Dbh;
    
    public $Name;
    
    public function __construct($id_country = ""){
        $this->Dbh = $this->connexion(); 
        if ($id_country != ""){
            $this->Id = $id_country;
        }
    }
    
    public function checkCountry(){
         $stmt = $this->Dbh->prepare('SELECT * FROM id_country WHERE id= ?');
        $stmt->execute(array($this->Id));
        if ($stmt->rowCount() == 1){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function getCountry(){
        $stmt = $this->Dbh->prepare('SELECT * FROM country WHERE id= ?');
        $stmt->execute(array($this->Id));
        $result = $stmt->fetchAll();     
        foreach ($result as $country){
            $this->Name = $country['name_fr_fr'];
        }
    }


    public function getListCountries(){
        $stmt = $this->Dbh->prepare('SELECT * FROM Countries');
        $stmt->execute();
        return $stmt->fetchAll();     
    }
  
}
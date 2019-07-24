<?php
require_once("model/Config.php");

class Cities extends Config
{

    private $Id;
    private $Dbh;
    
    public $Name;
    public $listCity;
    public $city;
    
    public function __construct($id_city = ""){
        $this->Dbh = $this->connexion(); 
        if ($id_city != ""){
            $this->Id = $id_city;
        }
    }
    
    public function checkCity(){
        $stmt = $this->Dbh->prepare('SELECT * FROM cities WHERE id= ?');
        $stmt->execute(array($this->Id));
        if ($stmt->rowCount() == 1){
            return true;
        }else{
            return false;
        }
    }

    public function add($data){
        $sql = "INSERT INTO Cities (name, id_country) VALUE(?, ?)";
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, strtolower($data['name']), PDO::PARAM_STR);
        $req->bindValue(2, $data['id_country'], PDO::PARAM_INT);
        return $req->execute();
    }

    public function edit() {
        throw new Exception('la function edit n\'est pas faite');
    }

    public function setCity($id = null){
        $sql = 'SELECT * FROM Cities WHERE id = ' . $id;
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        foreach ($req->fetchAll() as $key => $city) {
            $this->city = $city;
        }
    }

    public function getListCities(){
        $stmt = $this->Dbh->prepare('SELECT cities.id, cities.name AS cityName, countries.name_fr_fr AS countryName FROM Cities JOIN Countries ON cities.id_country = countries.id');
        $stmt->execute();
        return $stmt->fetchAll();     
    }

    public function delete($id) {
        $stmt = $this->Dbh->prepare("DELETE FROM Cities WHERE id = $id");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }
}
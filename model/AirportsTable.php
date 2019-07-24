<?php
require_once("model/Config.php");

class Airports extends Config
{

    private $Dbh;
    public $airportArr = '';
    public $airportDep = '';
    
    public function __construct(){
        $this->Dbh = $this->connexion(); 
    }
    
    public function getListAirports(){
        $sql = 'SELECT airports.name AS airportName, cities.name AS cityName, airports.id
        FROM airports
        JOIN cities ON cities.id = airports.id_city';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function setAirport($id = null, $provider = null){
        $sql = 'SELECT airports.name AS airportName, cities.name AS cityName, airports.id, countries.name_fr_fr AS countryName
        FROM airports
        JOIN cities ON cities.id = airports.id_city
        JOIN countries ON countries.id = airports.id_country
        WHERE airports.id = ' . $id;
        
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        foreach ($req->fetchAll() as $key => $airport) {
            if($provider == 'arr')
                $this->airportArr = $airport;
            else
                $this->airportDep = $airport;
        }
    }
    
    public function getAirportsFromCity($letters){
        $sql = 'SELECT airports.name AS airportName, cities.name AS cityName, airports.id AS airportID FROM airports JOIN cities ON airports.id_city = cities.id WHERE cities.name LIKE "' . ucfirst(strtolower($letters)) .'%"'; 
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        echo json_encode($req->fetchAll());
    }

    
}
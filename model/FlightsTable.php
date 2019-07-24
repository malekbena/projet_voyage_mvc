<?php
require_once("model/Config.php");

class Flights extends Config
{
    public $Id;
    private $Dbh;

    public function __construct()
    {
        $this->Dbh = $this->connexion();
    }

    public function getFlightsList()
    {
        $sql = 'SELECT flights.*, 
        a1.name AS airportDepName, a2.name AS airportArrName, 
        airline_company.name AS companyName,
        countryDep.name_fr_fr AS countryDepName,
        countryArr.name_fr_fr AS countryArrName,
		cityDep.name AS cityDepName,
        cityArr.name AS cityArrName
		FROM flights
        JOIN airports AS a1 ON flights.id_airport_dep = a1.id
        JOIN airports AS a2 ON flights.id_airport_arr = a2.id
        JOIN airline_company ON flights.id_company = airline_company.id
        JOIN countries AS countryDep ON a1.id_country = countryDep.id
        JOIN countries AS countryArr ON a2.id_country = countryArr.id
		JOIN cities AS cityDep ON a1.id_city = cityDep.id
		JOIN cities AS cityArr ON a2.id_city = cityArr.id';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function add($data)
    {
        $sql = "INSERT INTO flights (id_airport_dep, id_airport_arr, h_dep, h_arr, price, id_company) VALUE(?,?,?,?,?,?)";
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, intval($data['id_airport_dep']), PDO::PARAM_INT);
        $req->bindValue(2, intval($data['id_airport_arr']), PDO::PARAM_INT);
        $req->bindValue(3, $data['h_dep'], PDO::PARAM_STR);
        $req->bindValue(4, $data['h_arr'], PDO::PARAM_STR);
        $req->bindValue(5, $data['price'], PDO::PARAM_INT);
        $req->bindValue(6, intval($data['id_company']), PDO::PARAM_INT);
        return $req->execute();
    }

    public function getFlight($id)
    {
        $sql = 'SELECT flights.*, airline_company.name as companyName
        FROM flights
        JOIN airline_company ON airline_company.id = flights.id_company
        WHERE flights.id = ' . $id;
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($data)
    {
        $sql = "UPDATE flights SET id_airport_dep = ?, id_airport_arr = ?, h_dep = ?, h_arr = ?, price = ?, id_company = ? WHERE id = " . $data['id'];
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, intval($data['id_airport_dep']), PDO::PARAM_INT);
        $req->bindValue(2, intval($data['id_airport_arr']), PDO::PARAM_INT);
        $req->bindValue(3, $data['h_dep'], PDO::PARAM_STR);
        $req->bindValue(4, $data['h_arr'], PDO::PARAM_STR);
        $req->bindValue(5, $data['price'], PDO::PARAM_INT);
        $req->bindValue(6, intval($data['id_company']), PDO::PARAM_INT);
        return $req->execute();
    }

    public function delete($id)
    {
        $stmt = $this->Dbh->prepare("DELETE FROM flights WHERE id = $id");
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

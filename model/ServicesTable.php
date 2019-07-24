<?php
require_once("model/Config.php");

class services extends Config
{

    public function __construct()
    {
        $this->Dbh = $this->connexion();
    }

    public function getAllServices()
    {
        $sql = 'SELECT services.*, sh.id_hotel AS idHotel 
        FROM services 
        JOIN services_hotels AS sh ON sh.id_service = services.id';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    public function getListSevices(){
        $sql = 'SELECT * FROM services';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function edit($data)
    {
        $name = strip_tags($data['name']);
        $sql = "UPDATE services SET name = ? WHERE id = " . $data['id'];
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, $name, PDO::PARAM_STR);
        return $req->execute();
    }

    public function getService($id)
    {
        $req = $this->Dbh->prepare('SELECT * FROM services WHERE id = ?');
        $req->execute(array($id));
        return $req->fetchAll();
    }

    public function add($data)
    {
        $sql = 'INSERT INTO services (name) VALUE (?)';
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, strtolower($data['name']), PDO::PARAM_STR);
        return $req->execute();
    }

    public function delete($id)
    {
        $stmt = $this->Dbh->prepare("DELETE FROM services WHERE id = $id");
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getLastInsert()
    {
        $id = $this->Dbh->lastInsertId();
        return $this->getService($id);
    }
}

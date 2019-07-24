<?php
// appel l'object config
require_once("model/Config.php");

// extends = permet d'accéder aux fonctions et variable de l'objet config
class Newsletters extends Config
{
    private $id_user = '';
    private $Dbh;
    
    public function __construct(){
        $this->Dbh = $this->connexion();
    }

    public function delete($id) {
        $stmt = $this->Dbh->prepare("DELETE FROM Newsletters WHERE id = $id");
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function add($data, $img){
        $email = strip_tags($data['email']);
        $sql = "INSERT INTO Newsletters (email, img) VALUE(?, ?)";
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, strtolower($email), PDO::PARAM_STR);
        $req->bindValue(2, strtolower($img), PDO::PARAM_STR);
        return $req->execute();
    }

    public function edit($data){
        $email = strip_tags($data['email']);
        $sql = "UPDATE Newsletters SET email = ? WHERE id = " . $data['id'];
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, $email, PDO::PARAM_STR);
        return $req->execute();
    }

    public function getLastInsert() {
        $id = $this->Dbh->lastInsertId();
        return $this->getEmail($id);
    }

    public function getEmail($id) {
        $req = $this->Dbh->prepare('SELECT * FROM Newsletters WHERE id = ?');
        $req->execute(array($id));  
        return $req->fetchAll();
    }

    public function getListEmail() {
        $stmt = $this->Dbh->prepare("SELECT * FROM newsletters ORDER BY position ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function setIdUser ($value){
        $this->id_user = $value;
    }
    
    public function sortByPos($data)
    {
        foreach ($data as $key => $value) {
            $sql = 'UPDATE newsletters SET position = ' . $key . '  WHERE newsletters.id = ' . $value;
            $req = $this->Dbh->prepare($sql);
            $req->execute();
        }
    }
}
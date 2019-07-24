<?php
require_once("./model/Config.php");

class Users extends Config
{
    public $Id;
    private $Dbh;

    public $Firstname;
    public $Lastname;
    public $Email;
    public $User_id;
    public $Avatar;
    public $user;
    public $role;



    public function __construct()
    {
        $this->Dbh = $this->connexion();
    }

    public function getRoles()
    {
        $sql = 'SELECT * FROM roles';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }
    public function deleteAvatar($id)
    {
        $sql = "UPDATE users SET avatar = NULL WHERE id = " . $id;
        $req = $this->Dbh->prepare($sql);
        return $req->execute();
    }

    public function check_user($email, $password)
    {
        $stmt = $this->Dbh->prepare('SELECT users.* FROM users WHERE users.email = ? AND users.password = ? AND users.id_role != 1');
        $stmt->execute(array($email, $password));

        if ($stmt->rowCount() == 1) {
            $result = $stmt->fetchAll();
            foreach ($result as $user) {
                $this->Id = $user['id'];
                $this->Firstname = $user['firstname'];
                $this->Lastname = $user['lastname'];
                $this->Email = $user['email'];
                $this->role = $user['id_role'];
                $user['avatar'] != '' ? $this->Avatar = $user['avatar'] : '';
            }
            return true;
        } else {
            return false;
        }
    }

    public function getlistUsers()
    {
        $sql = 'SELECT users.*, countries.name_fr_fr AS countryName, cities.name AS cityName
        FROM users
        JOIN countries ON countries.id = users.id_country
        JOIN cities ON cities.id = users.id_city ORDER BY users.position ASC';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function setUser($id)
    {
        $sql = 'SELECT users.*, countries.id AS countryId, cities.id AS cityId
        FROM Users
        JOIN countries ON countries.id = users.id_country
        JOIN cities ON cities.id = users.id_city
        WHERE users.id = ' . $id;
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        foreach ($req->fetchAll() as $key => $user) {
            $this->user = $user;
        }
    }

    public function add($data)
    {
        $sql = "INSERT INTO users (firstname, lastname, email, phone, address, zip, id_city, id_country, avatar, password, id_role) VALUE(?,?,?,?,?,?,?,?,?,?,?)";
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, trim($data['firstname']), PDO::PARAM_STR);
        $req->bindValue(2, $data['lastname'], PDO::PARAM_STR);
        $req->bindValue(3, $data['email'], PDO::PARAM_STR);
        $req->bindValue(4, $data['phone'], PDO::PARAM_STR);
        $req->bindValue(5, $data['address'], PDO::PARAM_STR);
        $req->bindValue(6, $data['zip'], PDO::PARAM_STR);
        $req->bindValue(7, intval($data['id_city']), PDO::PARAM_INT);
        $req->bindValue(8, intval($data['id_country']), PDO::PARAM_INT);
        $req->bindValue(9, $data['avatar'], PDO::PARAM_STR);
        $req->bindValue(10, md5($data['password']), PDO::PARAM_STR);
        $req->bindValue(11, intval($data['id_role']), PDO::PARAM_INT);
        return $req->execute();
    }

    public function edit($data)
    {
        $sql = "UPDATE Users SET firstname = ?, lastname = ?, email = ?, phone = ?, address = ?, zip = ?, id_city =?, id_country = ?, password = ?, role = ? WHERE id = " . $data['id'];
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, $data['firstname'], PDO::PARAM_STR);
        $req->bindValue(2, $data['lastname'], PDO::PARAM_STR);
        $req->bindValue(3, $data['email'], PDO::PARAM_STR);
        $req->bindValue(4, $data['phone'], PDO::PARAM_STR);
        $req->bindValue(5, $data['address'], PDO::PARAM_STR);
        $req->bindValue(6, $data['zip'], PDO::PARAM_STR);
        $req->bindValue(7, intval($data['id_city']), PDO::PARAM_INT);
        $req->bindValue(8, intval($data['id_country']), PDO::PARAM_INT);
        $req->bindValue(9, md5($data['password']), PDO::PARAM_STR);
        $req->bindValue(10, $data['role'], PDO::PARAM_STR);
        return $req->execute();
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM Users WHERE id = ' . $id;
        $req = $this->Dbh->prepare($sql);
        return $req->execute();
    }

    public function sortByPos($data)
    {
        foreach ($data as $key => $value) {
            $sql = 'UPDATE users SET position = ' . $key . '  WHERE users.id = ' . $value;
            $req = $this->Dbh->prepare($sql);
            $req->execute();
        }
    }
}

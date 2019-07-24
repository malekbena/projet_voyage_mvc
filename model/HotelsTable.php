<?php
require_once("model/Config.php");

class Hotels extends Config
{
 
    //Propriétés ou attributs. Ce qui définit l'objet
    //Private -> uniquement visible dans l'objet
    private $Id_hotel;
    private $Id_city;
    private $Id_country;
    private $Dbh;
    private $FormatingTools;
    
    //Public -> Accessible dans et hors de l'objet
    public $TblPhotos = array();
    public $TblServices = array();
    public $TblCities = array();
    public $TblHotels = array();
    
    public $HotelName;
    public $HotelAddress;
    public $HotelZip;
    public $HotelPhone;
    public $HotelWeb;
    public $HotelDesc;
    public $HotelLevel;
    public $HotelCountryName;
    public $HotelCityName;
    public $hotel;
  
   // Constructeur qui permet d'initialiser l'objet et de passer les paramètres par défaut dès l'instanciation
    public function __construct(){
        $this->Dbh = $this->connexion();
        $this->loadPhotos();    
        $this->loadServices();
    }

    public function getList($param = ""){
        $req = 'SELECT hotel.*,city.name AS cityName,country.name_fr_fr AS countryName FROM hotel INNER JOIN city ON hotel.id_city=city.id INNER JOIN country ON hotel.id_country = country.id WHERE ';
        
        if ($param == "byCity"){
             $stmt = $this->Dbh->prepare($req.' hotel.id_city = ?');
             $stmt->execute(array($this->Id_city));
        }
         if ($param == "byCountry"){
             $stmt = $this->Dbh->prepare($req.' hotel.id_country = ?');
             $stmt->execute(array($this->Id_country));
        } 
         if ($param == "byHotel"){
             $stmt = $this->Dbh->prepare($req.' hotel.id = ?');
             $stmt->execute(array($this->Id_hotel));
        } 
        
        $this->TblHotels = $stmt->fetchAll();  
    }
    

     //Liste des méthodes. Elles permettent d'effectuer des actions
    //Ex: Charger une liste de données provenant de la base de données ou encore formater des données
     public function getHotel(){
            $stmt = $this->Dbh->prepare(
                'SELECT hotel.*,city.name AS cityName,country.name_fr_fr AS countryName 
                FROM hotel 
                INNER JOIN city ON hotel.id_city=city.id 
                INNER JOIN country ON hotel.id_country = country.id 
                WHERE hotel.id = ?'
            );
            $stmt->execute(array($this->Id_hotel));
            $result = $stmt->fetchAll();     
            foreach ($result as $hotel){
                    $this->Id_hotel = $hotel['id'];
                    $this->Id_city = $hotel['id_city'];
                    $this->Id_country = $hotel['id_country'];
                    $this->HotelName = $hotel['name'];
                    $this->HotelAddress = $hotel['address'];
                    $this->HotelZip = $hotel['zip'];
                    $this->HotelPhone = $hotel['phone'];
                    $this->HotelWeb = $hotel['web'];
                    $this->HotelDesc = $hotel['description'];
                    $this->HotelLevel = $hotel['level'];
                    $this->HotelCountryName = $hotel['countryName']; 
                    $this->HotelCityName = $hotel['cityName']; }

     }
    public function getListHotelsByCity($id){
        $stmt = $this->Dbh->prepare('SELECT city.* FROM city INNER JOIN hotel ON hotel.id_city = city.id GROUP BY city.id');
        $stmt->execute();
        $this->TblCities =  $stmt->fetchAll();
    }
    

    public function loadPhotos(){
            $stmt = $this->Dbh->prepare('SELECT * FROM photos');
            $stmt->execute();
            $this->TblPhotos = $stmt->fetchAll();
                    
    }
    
     public function loadServices(){
            $stmt = $this->Dbh->prepare('SELECT services.name,services_hotel.* FROM
            services INNER JOIN services_hotel ON services.id = services_hotel.id_service');
            $stmt->execute();
            $this->TblServices = $stmt->fetchAll();
    }
    
    //ACCESSEURS    
    //Setter -> Méthode qui permettent de définir la valeur d'une propriété (ou attribut) privée (private)
    public function setId_hotel($id){
        $this->Id_hotel = $id;
    }
    
    public function setId_city($id){
        $this->Id_city = $id;
    }
    
    public function setId_country($id){
         $this->Id_country = $id; 
    }
    
    //Getter
    public function getId_city(){
        return $this->Id_city;
    }

    public function getListHotels($id){
        $sql = 'SELECT * FROM hotels
        JOIN photos ON photos.id_hotel = hotels.id
        WHERE hotels.id_city = ' . $id . '
        AND photos.cover = true';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getServicesByHotel($id){
        
    }
    public function getAllHotels(){
        $sql = 'SELECT hotels.*, hotels.name AS hotelName, cities.name AS cityName, countries.name_fr_fr AS countryName 
        FROM hotels
        JOIN cities ON hotels.id_city = cities.id
        JOIN countries ON hotels.id_country = countries.id';
        $req = $this->Dbh->prepare($sql);
        $req->execute(); 
        return $req->fetchAll();
    }

    public function edit($data)
    {
        $sql = "UPDATE hotels SET name = ?, level = ?, id_city = ?, id_country = ?, address = ?, zip = ?, phone = ?, web = ?, description = ?, price = ? WHERE id = " . $data['id'];
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, $data['name'], PDO::PARAM_STR);
        $req->bindValue(2, $data['level'], PDO::PARAM_STR);
        $req->bindValue(3, intval($data['id_city']), PDO::PARAM_INT);
        $req->bindValue(4, intval($data['id_country']), PDO::PARAM_INT);
        $req->bindValue(5, $data['address'], PDO::PARAM_STR);
        $req->bindValue(6, $data['zip'], PDO::PARAM_STR);
        $req->bindValue(7, $data['phone'], PDO::PARAM_INT);
        $req->bindValue(8, $data['web'], PDO::PARAM_STR);
        $req->bindValue(9, $data['description'], PDO::PARAM_STR);
        $req->bindValue(10, $data['price'], PDO::PARAM_STR);
        return $req->execute();
    }

    public function add($data)
    {
        $sql = "INSERT INTO hotels (name, level, id_city, id_country, address, zip, phone, web, description, price) VALUE(?,?,?,?,?,?,?,?,?,?)";
        $req = $this->Dbh->prepare($sql);
        $req->bindValue(1, $data['name'], PDO::PARAM_STR);
        $req->bindValue(2, $data['level'], PDO::PARAM_STR);
        $req->bindValue(3, intval($data['id_city']), PDO::PARAM_INT);
        $req->bindValue(4, intval($data['id_country']), PDO::PARAM_INT);
        $req->bindValue(5, $data['address'], PDO::PARAM_STR);
        $req->bindValue(6, $data['zip'], PDO::PARAM_STR);
        $req->bindValue(7, $data['phone'], PDO::PARAM_INT);
        $req->bindValue(8, $data['web'], PDO::PARAM_STR);
        $req->bindValue(9, $data['description'], PDO::PARAM_STR);
        $req->bindValue(10, $data['price'], PDO::PARAM_STR);
        return $req->execute();
    }

    public function setHotel($id = null)
    {
        $sql = 'SELECT * FROM hotels WHERE id = ' . $id;
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        foreach ($req->fetchAll() as $key => $hotel) {
            $this->hotel = $hotel;
        }
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM hotels WHERE id = ' . $id;
        $req = $this->Dbh->prepare($sql);
        return $req->execute();
    }
}
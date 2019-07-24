<?php
require_once("model/Config.php");

class Offers extends Config
{

    private $Dbh;

    public function __construct()
    {
        $this->Dbh = $this->connexion();
    }
    
    public function getListOffers($airportArr, $airportDep, $date_start, $date_end)
    {

        $sql = 'SELECT offers.id, hotels.name AS hotelName, flights.price AS flightPrice, 
        hotels.price AS hotelPrice, photos.filename, hotels.level, 
        offers.id_hotel, flights.id AS id_flight, offers.name AS offerName
        FROM Offers
        JOIN flights_offers ON flights_offers.id_offer = offers.id
        JOIN flights ON flights.id = flights_offers.id_flight
        JOIN hotels ON hotels.id = offers.id_hotel
        JOIN photos ON photos.id_hotel = hotels.id
        JOIN airports AS a1 ON a1.id = flights.id_airport_arr 
        JOIN airports AS a2 ON a2.id = flights.id_airport_dep
        WHERE a1.id = ' . $airportArr . '
        AND a2.id = ' . $airportDep . '
        AND photos.cover = true
        AND Offers.date_start <= "' . $date_start . '"
        AND Offers.date_end >= "' . $date_end . '"';

        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function getAllOffers()
    {
        $sql = 'SELECT offers.*,
        hotels.name AS hotelName, hotels.level AS hotelLvl, hotels.price AS hotelPrice, hotels.address AS hotelAddress,
        cities.NAME AS cityName,
        countries.name_fr_fr AS countryName,
        flightDep.h_dep AS fDep, flightDep.h_arr, flightDep.price AS flightDepPrice,
        flightRet.h_dep AS fRet, flightDep.h_arr, flightRet.price AS flightRetPrice,
        aDepDep.name AS airportDepDep,
        aArrDep.name AS airportArrDep,
        aDepRet.name AS airportDepRet,
        aArrRet.name AS airportArrRet
        FROM offers
        JOIN hotels ON hotels.id = offers.id_hotel
        JOIN countries ON countries.id = hotels.id_country
        JOIN cities ON cities.id = hotels.id_city
        LEFT JOIN flights_offers ON flights_offers.id_offer = offers.id
        LEFT JOIN flights AS flightDep ON flightDep.id = flights_offers.id_flight
        LEFT JOIN airports AS aDepDep ON aDepDep.id = flightDep.id_airport_dep
        LEFT JOIN airports AS aArrDep ON aArrDep.id = flightDep.id_airport_arr
        LEFT JOIN flights AS flightRet ON flightRet.id = flights_offers.id_flight
        LEFT JOIN airports AS aDepRet ON aDepRet.id = flightRet.id_airport_dep
        LEFT JOIN airports AS aArrRet ON aArrRet.id = flightRet.id_airport_arr
        GROUP BY offers.id';
        $req = $this->Dbh->prepare($sql);
        $req->execute();
        return $req->fetchAll();
    }

    public function offerPrice($data)
    {
        $startTimeStamp = strtotime($data['date_start']);
        $endTimeStamp = strtotime($data['date_end']);
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff / 86400;  // 86400 seconds per day
        $numberDays = intval($numberDays);
        $price = $numberDays * $data['hotelPrice'] + $data['flightDepPrice'] + $data['flightRetPrice']; 
        return $price; 
    }

    public function sortByPos($data)
    {
        foreach ($data as $key => $value) {
            $sql = 'UPDATE offers SET position = ' . $key . '  WHERE offers.id = ' . $value;
            $req = $this->Dbh->prepare($sql);
            $req->execute();
        }
    }

}

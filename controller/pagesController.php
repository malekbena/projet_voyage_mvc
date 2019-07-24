<?php 
require('model/CountriesTable.php');
require('model/CitiesTable.php');
require('model/AirportsTable.php');
require('model/OffersTable.php');
require('model/HotelsTable.php');
require('model/NewslettersTable.php');
// require all model you need

function index() {
    $Airports = new Airports();
    $listAirports = $Airports->getListAirports();
    require('view/pages/index.php');
}

function destinations(){
    die('destinations');
    require('view/pages/destinations.php');
}

function reservations(){
    if (   isset($_POST['airportArr']) && isset($_POST['airportDep']) && isset($_POST['date_in']) 
    && isset($_POST['date_out'])    ){
        if ($_POST['date_in'] > $_POST['date_out']) {
            index();
        }else{
            $datetime1 = new DateTime($_POST['date_in']);
            $datetime2 = new DateTime($_POST['date_out']);
            $interval = $datetime1->diff($datetime2);
            $duration = $interval->format('%a');


            $Airports = new Airports();
            $listAirports = $Airports->getListAirports();
            

            $Airports->setAirport($_POST['airportDep'], 'dep');
            $Airports->setAirport($_POST['airportArr'], 'arr');
            $airportArr = $Airports->airportArr;
            $airportDep = $Airports->airportDep;

            $Offers = new Offers();
            $listOffers = $Offers->getListOffers($_POST['airportArr'], $_POST['airportDep'], $_POST['date_in'], $_POST['date_out']);
            require('view/pages/reservations.php');
            
        }
    }else{
        index();
    }
}



function detailOffer(){
    if (isset($_GET['id'])) {
        $Hotels = new Hotels();
        $services = $Hotels->getServicesByHotel($_GET['id']);
    }else{
        index();
    }
}

function pagesDispatcher($action = 'index'){
    switch ($action) {
        case 'index':
            index();
            break;
        case 'destinations':
            destinations();
            break;
        case 'reservations':
            reservations();
            break;
        case 'detailOffer':
            detailOffer();
            break;
        default:
            index();
            break;
    }
}
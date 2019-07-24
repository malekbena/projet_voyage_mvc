<?php
require_once('model/FlightsTable.php');
require_once('model/AirportsTable.php');
require_once('model/CitiesTable.php');
require_once('model/CountriesTable.php');
require_once('model/CompaniesTable.php');

function index($flash = [])
{
    $Flights = new Flights();
    $flights = $Flights->getFlightsList();
    $controller = 'flights';
    require('view/manager/Flights/index.php');
}

function add()
{
    if (isset($_POST['id_airport_dep'])) {
        $Flights = new Flights();
        if ($Flights->add($_POST)) {
            index();
        } else {
            index();
        }
    } else {
        $controller = 'flights';
        $Flights = new Flights();
        $Airports = new Airports();
        $Cities = new Cities();
        $Companies = new Companies();
        $Countries = new Countries();
        $airports = $Airports->getListAirports();
        $cities = $Cities->getListCities();
        $countries = $Countries->getListCountries();
        $compagnies = $Companies->getListCompagnies();
        require('view/manager/Flights/add.php');
    }
}

function edit()
{
    $controller = "flights";
    $Flights = new Flights();
    if (isset($_POST['id_airport_dep']) && !empty($_POST['id_airport_dep'])) {
        if ($Flights->edit($_POST)) {
            $flash = $Flights->success('Le vol a bien été edité');
            index($flash);
        } else {
            $flash = $Flights->error('Le vol n\'a pas été edité');
            index($flash);
        }
    }
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $flight = $Flights->getFlight($_GET['id']);
        if ($flight) {
            $controller = 'flights';
            $Airports = new Airports();
            $Companies = new Companies();
            $airports = $Airports->getListAirports();
            $compagnies = $Companies->getListCompagnies();
            require('view/manager/Flights/edit.php');
        } else {
            throw new Exception('Aucun id selectionné pour la modification du vol');
        }
    } else {
        throw new Exception('Aucun id selectionné pour la modification du vol');
    }
}


function delete()
{
    // action delete ne renvois pas de vu, elle supprime la ligne dans la bdd et appel la fonction index qui elle renvoit une view
    $Cities = new Cities();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // obtenir la city via l'id pour l'afficher dans le message erreur ou success
        $Cities->setCity($_GET['id']);

        // si la requete renvois un city
        if ($Cities->city) {
            $city = $Cities->city;
        } else {
            $flash = $Cities->error('La suppression à échouée');
            index($flash);
        }

        // si la requete a renvoyé un city alors nous pouvons le supprimer et si la suppression c'est bien passée nous appelons la methode index()
        if ($Cities->delete($_GET['id'])) {
            $flash = $Cities->success('La ville ' . $city['name'] . ' a bien été supprimé');
            index($flash);
        } else {
            $flash = $Cities->error('La ville ' . $city['name'] . ' n\'a pas été supprimé');
            index($flash);
        }
    } else {
        throw new Exception('Aucun id selectionné pour la suppression Cities');
    }
}

function flightsDispatcher($action = 'index')
{
    switch ($action) {
        case 'index':
            index();
            break;
        case 'add':
            add();
            break;
        case 'edit':
            edit();
            break;
        case 'delete':
            delete();
            break;
        default:
            index();
            break;
    }
}

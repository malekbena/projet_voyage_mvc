<?php
require_once("model/Config.php");
require_once("model/HotelsTable.php");
require_once('model/CitiesTable.php');
require_once('model/CountriesTable.php');


function index($flash = [])
{
    $Hotels = new Hotels();
    $hotels = $Hotels->getAllHotels();
    $controller = 'hotels';
    require('view/manager/Hotels/index.php');
}

 function add()
{
    if (isset($_POST['name']) && isset($_POST['level'])) {
        $hotels = new hotels();
        if ($hotels->add($_POST)) {
            index();
        } else {
            index();
        }
    } else {
        $controller = 'hotels';
        $Hotels = new Hotels();
        $Countries = new Countries();
        $Cities = new Cities();
        $listCities = $Cities->getListCities();
        $listCountries = $Countries->getListCountries();
        require('view/manager/Hotels/add.php');
    }
}

function edit()
{
    $Hotels = new Hotels();
    $controller= 'hotels';
    if (isset($_POST['name'])) {
        if ($Hotels->edit($_POST)) {
            $flash = $Hotels->success('L\'hotel a été edité');
            index($flash);
        } else {
            $flash = $Hotels->error('L\'hotel n\'a pas été edité');
            index($flash);
        }
    } else {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $Hotels->setHotel($_GET['id']);
            if ($hotel = $Hotels->hotel) {
                $Hotels = new Hotels();
                $Countries = new Countries();
                $Cities = new Cities();
                $listCities = $Cities->getListCities();
                $listCountries = $Countries->getListCountries();
                require('view/manager/Hotels/edit.php');
            } else {
                throw new Exception('aucun hotel ne correspond à l\'id');
            }
        } else {
            throw new Exception('aucun id');
        }
    }
}

function delete()
{
    $Hotels = new Hotels();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $Hotels->setHotel($_GET['id']);
        if ($Hotels->hotel) {
            $hotel = $Hotels->hotel;
        } else {
            $flash = $Hotels->error('La suppression à échouée');
            index($flash);
        }
        if ($Hotels->delete($_GET['id'])) {
            $flash = $Hotels->success('L' . $hotel['name'] . ' a bien été supprimé');
            index($flash);
        } else {
            $flash = $Hotels->error('L/' . $hotel['name'] . ' n\'a pas été supprimé');
            index($flash);
        }
    } else {
        throw new Exception('Aucun id selectionné pour la suppression Hotels');
    }
}
 
function hotelsDispatcher($action = 'index')
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

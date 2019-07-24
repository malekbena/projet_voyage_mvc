<?php
require_once('model/OffersTable.php');
require_once('model/servicesTable.php');

function index($flash = [])
{
    $Offers = new Offers();
    $offers = $Offers->getAllOffers();
    $Services = new Services();
    $services = $Services->getAllServices();
    $controller = 'offers';
    require('view/manager/Offers/index.php');
}

function sortable()
{
    $Offers = new Offers();
    if (isset($_POST['item']) && !empty($_POST['item'])) {
        $Offers->sortByPos($_POST['item']);
    }
}

function offersDispatcher($action = 'index')
{
    switch ($action) {
        case 'index':
            index();
            break;
        default:
            index();
            break;
    }
}

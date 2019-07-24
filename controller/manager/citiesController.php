<?php
require_once('model/CitiesTable.php');
require_once('model/CountriesTable.php');

function index($flash = []) {
    $Cities = new Cities();
    $cities = $Cities->getListCities();
    $controller = 'cities';
    require('view/manager/Cities/index.php');
}

function add(){
    if (isset($_POST['name']) && isset($_POST['id_country'])) {
        $Cities = new Cities();
        if($Cities->add($_POST)){
            index();
        }else{
            index();
        }
    }else{
        $controller = 'cities';
        $Countries = new Countries();
        $listCountries = $Countries->getListCountries();
        require('view/manager/Cities/add.php');
    }
}

function edit() {
    $Cities = new Cities();
    $emails = $Cities->edit();
    
    require('view/manager/Cities/index.php');
}

function delete() {
    // action delete ne renvois pas de vu, elle supprime la ligne dans la bdd et appel la fonction index qui elle renvoit une view
    $Cities = new Cities();
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // obtenir la city via l'id pour l'afficher dans le message erreur ou success
        $Cities->setCity($_GET['id']);

        // si la requete renvois un city
        if ($Cities->city) {
            $city = $Cities->city;
        }else{
            $flash = $Cities->error('La suppression à échouée');
            index($flash);
        }

        // si la requete a renvoyé un city alors nous pouvons le supprimer et si la suppression c'est bien passée nous appelons la methode index()
        if($Cities->delete($_GET['id'])){
            $flash = $Cities->success('La ville ' . $city['name'] . ' a bien été supprimé');
            index($flash);
        }else{
            $flash = $Cities->error('La ville ' . $city['name'] . ' n\'a pas été supprimé');
            index($flash);
        }
    }else{
        throw new Exception('Aucun id selectionné pour la suppression Cities');
    }
}

function citiesDispatcher($action = 'index'){
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
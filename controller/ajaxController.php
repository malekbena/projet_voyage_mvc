<?php
require('model/AirportsTable.php');
require('model/UsersTable.php');

function airports()
{
    $Airports = new Airports();
    if (isset($_GET['letters']) && !empty($_GET['letters'])) {
        $Airports->getAirportsFromCity($_GET['letters']);
    }
}


function ajaxDispatcher($action)
{
    switch ($action) {
        case 'airports':
            airports();
            break;
        case 'users':
            users();
            break;
        default:
            airports();
            break;
    }
}

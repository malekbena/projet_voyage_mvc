<?php
try {
    session_start();
    if (!isset($_SESSION['user_is_connected']) || !$_SESSION['user_is_connected'] || !isset($_SESSION['user_id'])) {
        require('controller/manager/usersController.php');
        usersDispatcher('login');
    } else {
        if (isset($_GET['controller'])) {
            $action = isset($_GET['action']) ? $_GET['action'] : '';

            switch ($_GET['controller']) {
                case 'newsletters':
                    require('controller/manager/newslettersController.php');
                    newslettersDispatcher($action);
                    break;
                case 'users':
                    if ($action == 'logout') {
                        require('controller/manager/usersController.php');
                        usersDispatcher($action);
                    } else {
                        if ($_SESSION['role'] == 3) {
                            require('controller/manager/usersController.php');
                            usersDispatcher($action);
                        } else {
                            require('controller/manager/newslettersController.php');
                            newslettersDispatcher($action);
                        }
                    }
                    break;
                case 'hotels':
                    require('controller/manager/hotelsController.php');
                    hotelsDispatcher($action);
                    break;
                case 'cities':
                    require('controller/manager/citiesController.php');
                    citiesDispatcher($action);
                    break;
                case 'flights':
                    require('controller/manager/flightsController.php');
                    flightsDispatcher($action);
                    break;
                case 'services':
                    require('controller/manager/servicesController.php');
                    servicesDispatcher($action);
                    break;
                case 'offers':
                    require('controller/manager/offersController.php');
                    offersDispatcher($action);
                    break;
                default:
                    require('controller/manager/newslettersController.php');
                    newslettersDispatcher();
                    break;
            }
        } else {
            require('controller/manager/newslettersController.php');
            newslettersDispatcher();
        }
    }
} catch (Exception $e) {
    // throw new Exception('error');
    require('view/layout/error.php');
}

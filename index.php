<?php

try {
    if (isset($_GET['controller'])) {
        $action = isset($_GET['action']) ? $_GET['action'] : '';
        switch ($_GET['controller']) {            
            case 'pages':
                require('controller/pagesController.php');
                pagesDispatcher($action);
                break;
            case 'ajax':
                require('controller/ajaxController.php');
                ajaxDispatcher($action);
                break;
            default:
                // default view
                require('controller/pagesController.php');
                pagesDispatcher($action);
                break;
        }
    } else {
        // default view
        require('controller/pagesController.php');
        pagesDispatcher();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
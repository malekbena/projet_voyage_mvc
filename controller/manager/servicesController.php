<?php
require_once('model/servicesTable.php');

function index($flash = [])
{
    $Services = new Services();
    $services = $Services->getListSevices();
    $controller = 'services';
    require('view/manager/Services/index.php');
}

function add()
{
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $Services = new Services();
        if ($Services->add($_POST)) {
            $res = $Services->getLastInsert();
            $flash = $Services->success('Le service ' . $res[0]['name'] . ' a bien été ajouté');
            index($flash);
        } else {
            $flash = $Services->error('Le service n\'a pas été ajouté');
            // index($flash);
        }
    } else {
        $controller = "services";
        require('view/manager/Services/add.php');
    }
}

    function edit()
    {
        $Services = new Services();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            if ($Services->edit($_POST)) {
                $flash = $Services->success('Le service a bien été edité');
                index($flash);
            } else {
                $flash = $Services->error('Le service n\'a pas été edité');
                index($flash);
            }
        }
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $service = $Services->getService($_GET['id']);
            if ($service) {
                $controller = 'services';
                require('view/manager/Services/edit.php');
            } else {
                throw new Exception('Aucun id selectionné pour la modification Newsletters');
            }
        } else {
            throw new Exception('Aucun id selectionné pour la modification Newsletters');
        }
    }

    function delete()
    {
    $Services = new Services();
    if (isset($_GET['id']) && !empty($_GET['id'])) {

        $res = $Services->getService($_GET['id']);

        if ($res) {
            $name = $res[0]['name'];
        } else {
            $flash = $Services->error('La suppression à échouée');
            index($flash);
        }
        if ($Services->delete($_GET['id'])) {
            $flash = $Services->success('Le service ' . $name . ' a bien été supprimé');
            index($flash);
        } else {
            $flash = $Services->error('Le service ' . $name . ' n\'a pas été supprimé');
            index($flash);
        }
    } else {
        throw new Exception('Aucun id selectionné pour la suppression Services');
    }
}
    

    function servicesDispatcher($action = 'index')
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

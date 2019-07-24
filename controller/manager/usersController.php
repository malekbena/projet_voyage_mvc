<?php
require_once('model/UsersTable.php');
require_once('model/CitiesTable.php');
require_once('model/CountriesTable.php');

function deletePhoto()
{
    $Users = new Users();
    $Users->deleteAvatar($_GET['idUser']);
    $Users->removeImg($_GET['fileName']);
}
function index($flash = [])
{
    $Users = new Users();
    $listUsers = $Users->getlistUsers();
    $TblRoles = $Users->getRoles();
    $controller = 'users';
    require('view/manager/Users/index.php');
}

function sortable()
{
    $Users = new Users();
    if (isset($_POST['item']) && !empty($_POST['item'])) {
        $Users->sortByPos($_POST['item']);
    }
}

function edit()
{
    $Users = new Users();
    if (isset($_POST['firstname'])) {
        if ($Users->edit($_POST)) {
            $flash = $Users->success('L\'utilisateur a été edit');
            index($flash);
        } else {
            $flash = $Users->error('L\'utilisateur n\'a pas été edit');
            index($flash);
        }
    } else {
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $Users->setUser($_GET['id']);
            if ($user = $Users->user) {
                $Cities = new Cities();
                $Countries = new Countries();
                $listCities = $Cities->getListCities();
                $listCountries = $Countries->getListCountries();
                $TblRoles = $Users->getRoles();
                require('view/manager/Users/edit.php');
            } else {
                throw new Exception('aucun utilisateur ne correspond à l\'id');
            }
        } else {
            throw new Exception('aucun id');
        }
    }
}
function add($flash = [])
{
    $Users = new Users();
    $img = '';
    $TblRoles = $Users->getRoles();
    $Cities = new Cities();
    $Countries = new Countries();
    $listCities = $Cities->getListCities();
    $listCountries = $Countries->getListCountries();
    $ErrorImg = '';
    $requireForm = true;
    if (count($_POST) > 0) {
        if (empty($_POST['firstname'])) {
            $flash = $Users->error('Champ vide');
        } else {
            if (file_exists($_FILES['avatar']['tmp_name'])) {
                $res = $Users->upload($_FILES, 'avatar');
                $extension  = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $thumb = $Users->image_resize('./public/upload/' . $res['imgName'], './public/upload/thumbnail/' . $res['imgName'], $extension, 100, 100, 1);
                if ($thumb['execute']) {
                    $img = $res['imgName'];
                } else {
                    $ErrorImg = '<br>L\'image n\'a pas été uploadée : ' . $thumb['errorMsg'];
                }
            }

            $img != '' ? $_POST['avatar'] = $img : $_POST['avatar'] = NULL;

            if ($Users->add($_POST)) {
                $flash = $Users->success('L\'utilisateur a été add' . $ErrorImg);
                index($flash);
                $requireForm = false;
            } else {
                $flash = $Users->error('L\'utilisateur n\'a pas été add' . $ErrorImg);
            }
        }
    }
    if ($requireForm) {
        require('view/manager/Users/add.php');
    }
}
function delete()
{
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $Users = new Users();
        $Users->setUser($_GET['id']);
        if ($user = $Users->user) {
            if ($Users->delete($user['id'])) {
                $flash = $Users->success('L\'utilisateur a été delete');
                index($flash);
            }
        } else {
            throw new Exception('aucun id');
        }
    }
}

function login()
{
    $Users = new Users();
    if (isset($_POST['email']) && isset($_POST['password'])) {

        if ($Users->check_user($_POST['email'], md5($_POST['password']))) {
            $_SESSION['user_is_connected'] = true;
            $_SESSION['user_id'] = $Users->Id;
            $_SESSION['email'] = $Users->Email;
            $_SESSION['Firstname'] = $Users->Firstname;
            $_SESSION['Lastname'] = $Users->Lastname;
            $_SESSION['role'] = $Users->role;
            $Users->Avatar != '' ?  $_SESSION['avatar'] = $Users->Avatar : '';
            header('Location: manager.php');
        } else {
            $flash = $Users->error('Identifiant ou mot de passe invalide');
            require('view/manager/Users/login.php');
        }
    } else {

        require('view/manager/Users/login.php');
    }
}

function logout()
{
    session_destroy();
    header('Location: manager.php');
}


function UsersDispatcher($action = 'index')
{
    switch ($action) {
        case 'login':
            login();
            break;
        case 'logout':
            logout();
            break;
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
        case 'deletePhoto':
            deletePhoto();
            break;
        case 'sortable':
            sortable();
            break;
        default:
            index();
            break;
    }
}

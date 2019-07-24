<!-- les controllers appel les models accédent à leurs contenus (public) ex methodes variables .. 
ils font le traitement de ces données et renvois des views à l'utilisateur -->

<?php
// require de l'objet newsletters
require_once('model/NewslettersTable.php');

function index($flash = [])
{
    // instance de l'objet newsletters
    $Newsletters = new Newsletters();
    $newsletters = $Newsletters->getListEmail();
    // défini le nom des elements de la view (title, subtitle ..)
    $controller = "newsletters";
    // appel de la view index
    require('view/manager/Newsletters/index.php');
}

function add()
{
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $Newsletters = new Newsletters();

        $img = 'default.png';
        if (file_exists($_FILES['img']['tmp_name'])) {
            $res = $Newsletters->upload($_FILES, 'img');
            if ($res['execute']) {
                $img = $res['imgName'];
            }
        }


        if ($Newsletters->add($_POST, $img)) {
            $res = $Newsletters->getLastInsert();
            $flash = $Newsletters->success('L\'email ' . $res[0]['email'] . ' a bien été ajouté');
            index($flash);
        } else {
            $flash = $Newsletters->error('L\'email n\'a pas été ajouté');
            // index($flash);
        }
    } else {
        $controller = "newsletters";
        require('view/manager/Newsletters/add.php');
    }
}

function edit()
{
    $Newsletters = new Newsletters();
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        if ($Newsletters->edit($_POST)) {
            $flash = $Newsletters->success('L\'email a bien été edité');
            index($flash);
        } else {
            $flash = $Newsletters->error('L\'email n\'a pas été edité');
            index($flash);
        }
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // obtenir la newsletter via l'id
        $newsletter = $Newsletters->getEmail($_GET['id']);
        // si la requete renvois une newsletter
        if ($newsletter) {
            $controller = 'newsletters';
            require('view/manager/Newsletters/edit.php');
        } else {
            throw new Exception('Aucun id selectionné pour la modification Newsletters');
        }
    } else {
        throw new Exception('Aucun id selectionné pour la modification Newsletters');
    }
}

function delete()
{
    // action delete ne renvois pas de vu, elle supprime la ligne dans la bdd et appel la fonction index qui elle renvoit une view
    $Newsletters = new Newsletters();
    if (isset($_GET['id']) && !empty($_GET['id'])) {

        // obtenir l'email via l'id pour l'afficher dans le message erreur ou success
        $res = $Newsletters->getEmail($_GET['id']);

        // si la requete renvois un email
        if ($res) {
            $email = $res[0]['email'];
        } else {
            $flash = $Newsletters->error('La suppression à échouée');
            index($flash);
        }

        // si la requete a renvoyé un email alors nous pouvons le supprimer et si la suppression c'est bien passée nous appelons la methode index()
        if ($Newsletters->delete($_GET['id'])) {
            $flash = $Newsletters->success('L\'email ' . $email . ' a bien été supprimé');
            index($flash);
        } else {
            $flash = $Newsletters->error('L\'email ' . $email . ' n\'a pas été supprimé');
            index($flash);
        }
    } else {
        throw new Exception('Aucun id selectionné pour la suppression Newsletters');
    }
}

function sortable()
{
    $Newsletters = new Newsletters();
    if (isset($_POST['item']) && !empty($_POST['item'])) {
        $Newsletters->sortByPos($_POST['item']);
    }
}


// function appelée de base par le router manager.php => action = index par default (si il n'y avait pas de $_GET['action'] défini dans l'url)
function newslettersDispatcher($action = 'index')
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
        case 'sortable':
            sortable();
            break;
        default:
            index();
            break;
    }
}

<?php 
    // on creer une variable title
    $title = 'Index :: ' . $controller; 
?>

<!-- debut de la copie du content dans la variable $content -->
<?php ob_start(); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-capitalize"><?=$controller?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary text-capitalize"><?=$controller?> list</h6>
            <?php require('view/components/manager/add.php'); ?>
        </div>
        

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="sortable" data-controller="newsletters">
                    <?php 
                    // foreach de la variable newsletters récupérée depuis le controller
                    foreach ($newsletters as $key => $newsletter) { ?>
                        <tr id = "item-<?= $newsletter['id'] ?>">
                            <td>
                                <?=$newsletter['email']?>
                            </td>
                            <td>
                                <!-- appel de la page manager.php en lui passant les parametres controller (ici newsletters), action (edit ou add ..) et l'id (ici de la newsletters) -->
                                <a href="manager.php?controller=<?=$controller?>&action=edit&id=<?=$newsletter['id']?>"><i class="fas fa-info-circle text-warning mr-3"></i></a>
                                <a href="manager.php?controller=<?=$controller?>&action=delete&id=<?=$newsletter['id']?>"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- fin de la copie du content dans la variable $content -->
<?php $content = ob_get_clean(); ?>
<!-- appel du layout -->
<?php require('view/layout/manager.php'); ?>
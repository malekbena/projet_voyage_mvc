<?php ob_start() ?>
<?php 
    // on creer une variable title
    $title = 'Index :: ' . $controller; 
?>

<?php ob_start(); ?>
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800 text-capitalize"><?=$controller?></h1>
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
                        <th>Avatar</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                         <th>Email</th>
                        <th>Tél</th>
                        <th>Adresse</th>
                        <th>CP</th>
                        <th>Ville</th>
                         <th>Pays</th>
                        <th>Rôle</th>
        
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="sortable" data-controller="users">
                    <?php 
                    foreach ($listUsers as $key => $user) { ?>
                        <tr < id="item-<?= $user['id']?>" >
                            <td>
                                <?= $user['avatar'] !='' ? '<img src="./public/upload/thumbnail/'.$user['avatar'].'" class="img-thumbnail userThumb">' : ''?>
                            </td>
                            <td>
                                <?=$user['firstname']?>
                            </td>
                            <td>
                                <?=$user['lastname']?>
                            </td>
                            <td>
                                <?=$user['email']?>
                            </td>
                            <td>
                                <?=$user['phone']?>
                            </td>
                            <td>
                                <?=$user['address']?>
                            </td>
                            <td>
                                <?=$user['zip']?>
                            </td>
                            <td>
                                <?=$user['cityName']?>
                            </td>
                            <td>
                                <?=$user['countryName']?>
                            </td>
    
                            <td>
                                <?php
                                    foreach ($TblRoles as $role){
                                      
                                  echo $user['id_role'] == $role['id'] ? $role['name'] : '';
                                
                                    }
                                    ?>
                            </td>
                            <td>
                                <a href="manager.php?controller=<?=$controller?>&action=edit&id=<?=$user['id']?>"><i class="fas fa-info-circle text-warning mr-3"></i></a>
                                <a href="manager.php?controller=<?=$controller?>&action=delete&id=<?=$user['id']?>"><i class="fas fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/layout/manager.php'); ?>
<?php 
    $title = 'Index :: ' . $controller; 
?>

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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>City</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach ($cities as $key => $city) { ?>
                        <tr>
                            <td>
                                <?=$city['cityName']?>
                            </td>
                            <td>
                                <?=$city['countryName']?>
                            </td>
                            <td>
                                <a href="manager.php?controller=<?=$controller?>&action=edit&id=<?=$city['id']?>"><i class="fas fa-trash fa-info-circle text-warning mr-3"></i></a>
                                <a href="manager.php?controller=<?=$controller?>&action=delete&id=<?=$city['id']?>"><i class="fas fa-trash text-danger"></i></a>
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
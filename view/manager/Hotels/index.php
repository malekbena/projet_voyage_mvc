<?php
$title = 'Index :: ' . $controller;
?>

<?php ob_start(); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-capitalize"><?= $controller ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary text-capitalize"><?= $controller ?> list</h6>
            <?php require('view/components/manager/add.php'); ?>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Hotel</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Déscription</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($hotels as $key => $hotel) { ?>
                            <tr>
                                <td>
                                    <ul class="card shadow">
                                        <li>
                                            <?= $hotel['hotelName'] ?>
                                        </li>
                                        <li>
                                            <?= $hotel['level'] ?> étoiles
                                        </li>

                                    </ul>
                                </td>
                                <td>
                                    <ul class="card shadow">
                                        <li>
                                            <?= $hotel['address'] ?>
                                        </li>
                                        <li>
                                            <?= $hotel['zip'] ?>
                                        </li>
                                        <li>
                                            <?= $hotel['cityName'] ?>
                                        </li>
                                        <li>
                                            <?= $hotel['countryName'] ?>
                                        </li>

                                    </ul>
                                </td>
                                <td>
                                    <?= $hotel['phone'] ?>
                                </td>
                                <td>
                                    <?= $hotel['description'] ?>
                                </td>
                                <td>
                                    <a href="manager.php?controller=<?= $controller ?>&action=edit&id=<?= $hotel['id'] ?>"><i class="fas fa-trash fa-info-circle text-warning mr-3"></i></a>
                                    <a href="manager.php?controller=<?= $controller ?>&action=delete&id=<?= $hotel['id'] ?>"><i class="fas fa-trash text-danger"></i></a>
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
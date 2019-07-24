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
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Offres</th>
                            <th>Détails</th>
                            <th>Services</th>
                            <th>Détails prix</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="sortable">
                        <?php
                        foreach ($offers as $key => $offer) { ?>
                            <tr>
                                <td>
                                    <ul class="card shadow list-unstyled p-2">
                                        <li>
                                            Nom : <?= $offer['name'] ?>
                                        </li>
                                        <li>
                                            Début : <?= $offer['date_start'] ?>
                                        </li>
                                        <li>
                                            Fin : <?= $offer['date_end'] ?>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <ul class="card shadow list-unstyled p-2">

                                    <li>
                                        Hôtel : <?= $offer['hotelName'] ?>
                                    </li>
                                    <li>
                                        Adresse : <?= $offer['countryName'] ?> - <?= $offer['cityName'] ?>
                                    </li>
                                    <li>
                                        <?= $offer['hotelAddress'] ?>
                                    </li>
                                    <li>
                                        Aéroport départ : <?= $offer['airportDepDep'] ?>
                                    </li>
                                    <li>
                                        Aéroport arrivée : <?= $offer['airportArrDep'] ?>
                                    </li>

                                    </ul>
                                </td>
                                <td>
                                    <ul class="card shadow list-unstyled p-2">
                                        <?php
                                        foreach ($services as $key => $service) {
                                            if ($offer['id_hotel'] === $service['idHotel']) {

                                                ?>
                                                <li>
                                                    <?= $service['name'] ?>
                                                </li>

                                            <?php
                                        }
                                    }
                                    ?>
                                    </ul>

                                </td>
                                <td>
                                    <ul class="box shadow list-unstyled p-2">

                                        <li>
                                            Vol Aller : <?= $offer['flightDepPrice'] ? '<code class="text-success">' . $offer['flightDepPrice'] . ' €</code>' : '<code class="text-danger">NC</code>' ?>
                                        </li>
                                        <li>
                                            Vol retour : <?= $offer['flightRetPrice'] ? '<code class="text-success">' . $offer['flightRetPrice'] . ' €</code>' : '<code class="text-danger">NC</code>' ?>
                                        </li>
                                        <li>
                                            Prix hôtel / nuit : <?= $offer['hotelPrice'] ? '<code class="text-success">' . $offer['hotelPrice'] . ' €</code>' : '<code class="text-danger">NC</code>' ?>
                                        </li>
                                    </ul>
                                    <ul class="card shadow list-unstyled p-2">
                                        Total :
                                        <li>
                                            <?= $Offers->offerPrice($offer) ? '<code class ="text-success  ">' . $Offers->offerPrice($offer) . ' €</cod e>' : '<code class="text-danger">NC</code>' ?>
                                        </li>

                                    </ul>
                                </td>
                                <td>
                                    <a href="manager.php?controller=<?= $controller ?>&action=edit&id=<?= $offers['id'] ?>"><i class="fas fa-trash fa-info-circle text-warning mr-3"></i></a>
                                    <a href="manager.php?controller=<?= $controller ?>&action=delete&id=<?= $offers['id'] ?>"><i class="fas fa-trash text-danger"></i></a>
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
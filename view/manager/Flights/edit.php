<?php
$title = 'Add :: ' . $controller;
?>

<?php ob_start(); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $controller ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $controller ?> list</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add <?= $controller ?></h4>
                        </div>
                        <div class="card-content mt-5">
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $flight[0]['id'] ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Aéroport de départ</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_airport_dep">
                                                <?php
                                                foreach ($airports as $key => $airport) {
                                                    ?>
                                                    <option <?= $airport['id'] ==  $flight[0]['id_airport_dep'] ? 'selected' : '' ?> value="<?= $airport['id'] ?>"><?= $airport['airportName'] ?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Aéroport de départ</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_airport_arr">
                                                <?php
                                                foreach ($airports as $key => $airport) {
                                                    ?>
                                                    <option <?= $airport['id'] ==  $flight[0]['id_airport_arr'] ? 'selected' : '' ?> value="<?= $airport['id'] ?>"><?= $airport['airportName'] ?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Heure de départ</label>
                                        <div class="col-sm-10">
                                            <input type="time" step="1" class="form-control" name="h_dep" value="<?= $flight[0]['h_dep'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Heure d'arrivée</label>
                                        <div class="col-sm-10">
                                            <input type="time" step="1" class="form-control" name="h_arr" value="<?= $flight[0]['h_arr'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Prix du vol</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="price" value="<?= $flight[0]['price'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Compagnie</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_company">
                                                <?php
                                                foreach ($compagnies as $key => $company) {
                                                    ?>
                                                    <option <?= $company['id'] == $flight[0]['id_company'] ? 'selected' : '' ?> value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <input class="btn btn-block btn-warning" type="submit" value="Modifier">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/layout/manager.php'); ?>
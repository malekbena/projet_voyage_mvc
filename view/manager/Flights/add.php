<?php
$title = 'Add :: '. $controller ;
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
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Aéroport de Départ</label>
                                        <div class="col-sm-10">
                                            <select type="text" class="form-control" name="id_airport_dep" placeholder="Départ">
                                                <option value="">Aéroport de départ</option>
                                                <?php
                                                foreach ($airports as $key => $airport) {
                                                    ?>
                                                    <option value="<?= $airport['id'] ?>"> <?= $airport['airportName'] ?> </option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Aéroport d'arrivée</label>
                                        <div class="col-sm-10">
                                            <select type="text" class="form-control" name="id_airport_arr" placeholder="Arrivée">
                                                <option value="">Aéroport de départ</option>
                                                <?php
                                                foreach ($airports as $key => $airport) {
                                                    ?>
                                                    <option value="<?= $airport['id'] ?>"> <?= $airport['airportName'] ?> </option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Heure de Départ</label>
                                        <div class="col-sm-10">
                                            <input type="time" step="1" class="form-control" name="h_dep" placeholder="Heure de départ">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Heure d'arrivée</label>
                                        <div class="col-sm-10">
                                            <input type="time" step="1" class="form-control" name="h_arr" placeholder="heure d'arrivée">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Prix du vol</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="price" placeholder="Prix du vol">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Compagnie</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_company" placeholder="Prix du vol">
                                                <option value="">Compagnie</option>
                                                <?php
                                                foreach ($compagnies as $key => $compagny) {
                                                    ?>
                                                    <option value="<?= $compagny['id'] ?>"><?= $compagny['name'] ?></option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>


                                <!-- <div class="form-group">
                                        <label class="col-sm-2 control-label">Ville Départ</label>
                                        <div class="col-sm-10">
                                            <select type="text" class="form-control" name="id_city" placeholder="Nom de l'hotel">
                                                <option value="">ville de départ</option>
                                                <?php
                                                foreach ($cities as $key => $city) {
                                                    ?>
                                                                    <option value="<?= $city['id'] ?>"> <?= $city['cityName'] ?> </option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                </fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pays Départ</label>
                                        <div class="col-sm-10">
                                            <select type="text" class="form-control" name="id_country" placeholder="Nom de l'hotel">
                                                <option value="">Pays de départ</option>
                                                <?php
                                                foreach ($countries as $key => $country) {
                                                    ?>
                                                                    <option value="<?= $country['id'] ?>"> <?= $country['name_fr_fr'] ?> </option>
                                                <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset> -->


                                <input class="btn btn-block btn-success" type="submit" value="Ajouter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('view/layout/manager.php') ?>
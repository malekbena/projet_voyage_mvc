<?php
$title = 'Add :: <?= $controller ?>';
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
                                        <label class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="Nom de l'hotel">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">niveau</label>
                                        <input type="number" name="level" class="form-control" placeholder="Nombre d'étoiles">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <select name="id_city" class="form-control">
                                            <option selected disabled="">Ville</option>
                                            <?php
                                            foreach ($listCities as $city) {
                                                echo '<option value="' . $city['id'] . '">' . $city['cityName'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <select name="id_country" class="form-control">
                                            <option selected disabled="">Pays</option>
                                            <?php
                                            foreach ($listCountries as $country) {
                                                echo '<option value="' . $country['id'] . '">' . $country['name_fr_fr'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Adresse</label>
                                        <input type="text" name="address" class="form-control" placeholder="Adresse de l'hôtel">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Code postale</label>
                                        <input type="tel" name="zip" class="form-control" placeholder="Code postale de l'hôtel">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Téléphone</label>
                                        <input type="tel" name="phone" class="form-control" placeholder="Téléphone de l'hôtel">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Site Web (Optionnel)</label>
                                        <input type="text" name="web" class="form-control" placeholder="Site Web de l'hôtel">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Déscription</label>
                                        <input type="text" name="description" class="form-control" placeholder="Déscription de l'hôtel">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Prix</label>
                                        <input type="number" name="price" class="form-control" placeholder="Prix / Nuit">
                                    </div>
                                </fieldset>
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
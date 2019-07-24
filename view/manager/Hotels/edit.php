<?php ob_start() ?>
<?php $title = 'Hotel :: Edit'; ?>
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
                                <input type="hidden" name="id" value="<?= $hotel['id'] ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Nom</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" value="<?= $hotel['name'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Level</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="level" value="<?= $hotel['level'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Ville</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_city">
                                                <?php
                                                foreach ($listCities as $key => $city) {
                                                    ?>
                                                    <option value="<?= $city['id'] ?>"><?= $city['cityName'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Pays</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="id_country">
                                                <?php
                                                foreach ($listCountries as $key => $country) {
                                                    ?>
                                                    <option value=" <?= $country['id'] ?>"><?= $country['name_fr_fr'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="address" value="<?= $hotel['address'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">zip</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" name="zip" value="<?= $hotel['zip'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">City</label>
                                        <select name="id_city" class="form-control">
                                            <?php
                                            foreach ($listCities as $city) {
                                                ?>
                                                <option <?= $city['id'] == $hotel['id_city'] ? 'selected' : '' ?> value="<?= $city['id'] ?>"><?= $city['cityName'] ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Téléphone</label>
                                        <input type="number" name="phone" class="form-control" value="<?= $hotel['phone'] ?>">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Site Web (optionnel) </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="web" value="<?= $hotel['web'] ?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Déscription</label>
                                        <input type="text" name="description" class="form-control" value="<?= $hotel['description'] ?>">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Prix</label>
                                        <input type="number" name="price" class="form-control" value="<?= $hotel['price'] ?>">
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
<?php $content = ob_get_clean() ?>
<?php require('view/layout/manager.php') ?>
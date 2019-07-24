<?php ob_start() ?>
<?php  $title = 'User :: Edit'  ; ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Newsletters</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Newsletters list</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add Newsletters</h4>
                        </div>
                        <div class="card-content mt-5">
                            <form method="post">
                                <input type="hidden" name="id" value="<?=$user['id']?>">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">firstname</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="firstname" value="<?=$user['firstname']?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">lastname</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lastname" value="<?=$user['lastname']?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">email</label>
                                        <div class="col-sm-10">
                                        <input type="email" class="form-control" name="email" value="<?=$user['email']?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">phone</label>
                                        <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="phone" value="<?=$user['phone']?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">address</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address" value="<?=$user['address']?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">zip</label>
                                        <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="zip" value="<?=$user['zip']?>">
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
                                                        <option <?= $city['id'] == $user['id_city'] ? 'selected' : '' ?> value="<?=$city['id']?>"><?=$city['cityName']?></option>
                                            <?php  } ?>  
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Country</label>
                                        <select name="id_country" class="form-control">
                                            <?php 
                                                foreach ($listCountries as $country) { ?>
                                                        <option <?= $country['id'] == $user['id_country'] ? 'selected' : '' ?> value="<?=$country['id']?>"><?=$country['name_fr_fr']?></option>
                                            <?php  } ?>  
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">password</label>
                                        <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" value="<?=$user['password']?>">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        
                                        <label for="destination">Role</label>
                                        <select name="role" class="form-control">
                                            <?php
                                            foreach ($TblRoles as $role){
                                                ?>
                                            <option value="<?=$role['id'] ?>" <?= $user['id_role'] == $role['id'] ? 'selected' : '' ?>><?=$role['name'] ?></option> 
                                            <?php
                                            }
                                            ?>
                                            
 
                                        </select>
                                    </div>
                                </fieldset>
                                  <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Avatar</label>
                                        <div class="row" id="avatarRow">
                                            <div class="col-lg-3 text-center" id="avatarThumb">
                                                 <?= $user['avatar'] !='' && file_exists('./public/upload/thumbnail/'.$user['avatar']) ? '<img src="./public/upload/thumbnail/'.$user['avatar'].'" class="img-thumbnail userThumb"><br><a href="#" onClick="deleteUserPhoto('.$user['id'].',\''.$user['avatar'].'\'); return false;">Supprimer</a>' : ''?>
                                            </div>
                                            <div class="col-lg-9">
                                            <!-- <input type="hidden" name="MAX_FILE_SIZE" value="88888" /> -->
                                            <input type="file" class="form-control-file" name="avatar" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg">
                                            </div>
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
<?php $content = ob_get_clean() ?>
<?php require('view/layout/manager.php') ?>
<?php ob_start();

    // on creer une variable title
    $title = 'User :: Add' ; 
?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">User</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users list</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add user</h4>
                        </div>
                        <div class="card-content mt-5">
                            <form method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">firstname</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="firstname">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">lastname</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lastname" value="<?=@$_POST['lastname'] ?>    ">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">email</label>
                                        <div class="col-sm-10">
                                        <input type="email" required class="form-control" name="email" value="<?=@$_POST['email']?>    ">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">phone</label>
                                        <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="phone">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">address</label>
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" name="address">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">zip</label>
                                        <div class="col-sm-10">
                                        <input type="tel" class="form-control" name="zip">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">City</label>
                                        <select name="id_city" class="form-control">
                                            <?php 
                                                foreach ($listCities as $city) { ?>
                                                        <option value="<?=$city['id']?>"><?=$city['cityName']?></option>
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
                                                        <option value="<?=$country['id']?>"><?=$country['name_fr_fr']?></option>
                                            <?php  } ?>  
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">password</label>
                                        <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" autocomplete="off" value="">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group col-lg-4 mb-3">
                                        <label for="destination">Role</label>
                                        <select name="id_role" class="form-control">
                                            <?php
                                            foreach ($TblRoles as $role){
                                                ?>
                                            <option value="<?=$role['id'] ?>"><?=$role['name'] ?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Avatar</label>
                                        <div class="col-sm-10">
                                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="88888" /> -->
                                        <input type="file" class="form-control-file" name="avatar" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg" >
                                        </div>
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
<?php $content = ob_get_clean() ?>
<?php require('view/layout/manager.php') ?>
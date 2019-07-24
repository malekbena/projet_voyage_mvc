<?php 
    $title = 'Add :: <?=$controller?>'; 
?>

<?php ob_start(); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?=$controller?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?=$controller?> list</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Add <?=$controller?></h4>
                        </div>
                        <div class="card-content mt-5">
                            <form method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Service</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="votre service ici">
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
<?php $content = ob_get_clean(); ?>
<?php require('view/layout/manager.php'); ?>
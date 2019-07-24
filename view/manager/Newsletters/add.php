<?php 
    $title = 'Add :: Newsletters'; 
?>

<?php ob_start(); ?>
<!-- Begin Page Content -->
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
                            <form method="post" enctype="multipart/form-data">
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" placeholder="votre email ici">
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Img</label>
                                        <div class="col-sm-10">
                                        <!-- <input type="hidden" name="MAX_FILE_SIZE" value="88888" /> -->
                                        <input type="file" class="form-control-file" name="img" aria-describedby="fileHelp" accept=".png, .jpg, .jpeg">
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
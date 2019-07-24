<?php ob_start() ?>
<form class="user" method="post">
    <div class="form-group">
        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
        <input type="checkbox" class="custom-control-input" id="customCheck">
        <label class="custom-control-label" for="customCheck">Remember Me</label>
        </div>
    </div>
    <input type="submit" value="login" class="btn btn-primary btn-user btn-block">
   
</form>
<?php $content = ob_get_clean() ?>
<?php require('view/layout/login.php'); ?>

<?php $title = 'Home POOTour' ?>
<?php ob_start() ?>

<?php require('view/components/carousel.php') ?>
<?php require('view/components/bookingForm.php') ?>
<?php require('view/components/top_destination.php') ?>
<?php require('view/components/newsletter.php') ?>


<?php $content = ob_get_clean() ?>
<?php require('view/layout/default.php') ?>
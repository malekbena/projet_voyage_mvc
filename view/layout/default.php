<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link href="public/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />

    <title>POOTour</title>
</head>

<body>

    <?php require('view/components/navbar.php') ?>

    <?= $content ?>

    <footer class="row container-fluid justify-content-center pt-5 mx-auto">
        <div class="container sectionTop row justify-content-between">

            <!-- Logo Gauche -->
            <div class="col-lg-3 align-self-center">
                <a class="pr-3 row d-flex" href="#">
                    <h2><b>POO</b></h2>
                    <h2 class="t">Tour</h2>
                </a>
                <p class="">$dream = new travel()</p>
            </div>
            <!-- Liste Gauche -->

            <div class="col-lg-3 lien">
                <h3>Lien</h3>
                <ul class="p-0">
                    <li><a href="#">Acceuil</a></li>
                    <li><a href="#">Top déstinations</a></li>
                    <li><a href="#">Offres spéciales</a></li>
                    <li><a href="#">Actualités</a></li>
                    <li><a href="#">Newsletter</a></li>

                </ul>
            </div>

            <!-- Liste Milieu -->

            <div class="col-lg-3">
                <h3>Top déstinations</h3>
                <ul class="p-0">
                    <li>1.Réspublique Dominicaine</li>
                    <li>2.Seychelles</li>
                    <li>3.Canries</li>
                    <li>4.Cuba</li>
                    <li>5.Londres</li>
                </ul>
            </div>

            <!-- Liste Droite -->

            <div class="col-lg-3">
                <h3>Contact</h3>
                <ul class="p-0">
                    <li>+33 (0)3 55 99 88</li>
                    <li>info@poo-tour.com</li>
                    <li>Rue du Grand Voyage</li>
                    <li>51100 REIMS, France</li>
                </ul>
            </div>
        </div>
        <hr class="hr">
        <div class="container justify-content-center d-flex mx-auto mb-5">
            <a class="mr-5" href="#"><img src="public/img/facebook.png" alt=""></a>
            <a class="mr-5" href="#"><img src="public/img/twitter.png" alt=""></a>
            <a href="#"><img src="public/img/instagram.png" alt=""></a>

        </div>
        <button class="btn btn-primary" id="goTop" title="top"><i class="icon-arrowTop"></i></button>
    </footer>

</body>
<script type="text/javascript" src="public/js/main.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
<script type="text/javascript" src="public/js/leaflet.js"></script>
<script src="public/js/ajax.js"></script>


</html>
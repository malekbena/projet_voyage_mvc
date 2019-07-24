<?php $title = 'Home POOTour' ?>
<?php ob_start() ?>
<section class="pays container">

  <section class="row">
    <div class="col-lg-3">
      <form method="post">
        <div class="headerForm">
          <p class="m-0 text-center">votre recherche</p>
        </div>
        <div class="contentForm p-3">
          <div class="form-group mb-3">
            <label for="destination">Votre Voyage</label>
            <select class="form-control" name="airportDep" id="destination">
              <?php foreach ($listAirports as $key => $value) { ?>
                <option <?= $value['id'] == $_POST['airportDep'] ? 'selected' : '' ?>  value="<?=$value['id']?>"><?=$value['cityName']?> - <?=$value['airportName']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <select class="form-control" name="airportArr" id="destination">
              <?php foreach ($listAirports as $key => $value) { ?>
                <option <?= $value['id'] == $airportArr['id'] ? 'selected' : '' ?>  value="<?=$value['id']?>"><?=$value['cityName']?> - <?=$value['airportName']?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputEmail1">Date de départ</label>
            <div class="input-group flex-nowrap">
              <input type="date" name="date_in" value="<?=$_POST['date_in']?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">@</span>
              </div>
            </div>
          </div>
          <div class="form-group mb-3">
            <label for="exampleInputEmail1">Date de retour</label>
            <div class="input-group flex-nowrap">
              <input type="date" name="date_out" value="<?=$_POST['date_out']?>" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">@</span>
              </div>
            </div>
          </div>
          <div class="mt-4">
            <button class="btn w-100 btn-primary text-uppercase">Chercher</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-9">
      <div class="row m-0 mb-3">
        <p class="title m-0 text-uppercase green"><?=$airportArr['countryName']?></p>
      </div>
      <?php 
       if (count($listOffers) > 0){
        foreach ($listOffers as $key => $offer) { ?>
        <div class="row m-0 mb-3">
            <div class="col-lg-5 cover" style="background-image: url('public/img/<?=$offer['filename']?>');"></div>
            <div class="col-lg-7">
              <div class="row justify-content-between m-0">
                <div class="inline">
                  <p class="text-uppercase"><?=$offer['hotelName']?></p>
                  <p><small>vol + hotel</small></p>
                </div>
                <div class="price inline">
                  <p><?=$duration * $offer['hotelPrice'] + $offer['flightPrice']?>€</p>
                  <small>par personne</small>
                </div>
              </div>
              <div class="row justify-content-between m-0">
                <div class="row m-0">
                  <?php for ($i=0; $i < $offer['level']; $i++) { ?>
                    <i class="mr-2">X</i>
                  <?php } ?>
                </div>
                <a href="index.php?controller=pages&action=detailOffer&id=<?=$offer['id']?>" class="btn btn-primary ">Voir offre</a>
              </div>
            </div>
        </div>
        <hr>
      <?php }
       }else{
           echo 'Désolé, aucune offre ne correspond à votre recherche';
       }?>
      
    </div>
  </section>
  <section class="bg-gray">
    <div class="text-center">
      <h1 class="title">Découvrez le Brésil</h1>
    </div>
    <div class="row">
      <div class="col-lg-3 imgSize p-0 p-1">
        <div class="cover h-100 w-100 p-2" style="background-image: url('public/img/australia.jpg');">
          <div class="titleDescri">
            <div class="bg-green p-2 pl-3 pr-4 text-center">
              <p class="m-0 text-uppercase">hollande</p>
            </div>
            <div class="bg-blue p-2 pl-3 pr-4 text-center">
              <p class="m-0"><small>À partir de</small> <br> 350€/Pers</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 imgSize p-0 p-1">
        <div class="cover h-100 w-100 p-2" style="background-image: url('public/img/australia.jpg');">
          <div class="titleDescri">
            <div class="bg-green p-2 pl-3 pr-4 text-center">
              <p class="m-0 text-uppercase">hollande</p>
            </div>
            <div class="bg-blue p-2 pl-3 pr-4 text-center">
              <p class="m-0"><small>À partir de</small> <br> 350€/Pers</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 imgSize p-0 p-1">
        <div class="cover h-100 w-100 p-2" style="background-image: url('public/img/australia.jpg');">
          <div class="titleDescri">
            <div class="bg-green p-2 pl-3 pr-4 text-center">
              <p class="m-0 text-uppercase">hollande</p>
            </div>
            <div class="bg-blue p-2 pl-3 pr-4 text-center">
              <p class="m-0"><small>À partir de</small> <br> 350€/Pers</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 imgSize p-0 p-1">
        <div class="cover h-100 w-100 p-2" style="background-image: url('public/img/australia.jpg');">
          <div class="titleDescri">
            <div class="bg-green p-2 pl-3 pr-4 text-center">
              <p class="m-0 text-uppercase">hollande</p>
            </div>
            <div class="bg-blue p-2 pl-3 pr-4 text-center">
              <p class="m-0"><small>À partir de</small> <br> 350€/Pers</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<div class="gap-200"></div>

<?php $content = ob_get_clean() ?>
<?php require('view/layout/default.php') ?>
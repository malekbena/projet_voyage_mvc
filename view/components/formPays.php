
<section class="row">
  <div class="col-lg-3">
    <form class="formPays" method="get">
      <div class="headerForm">
        <p class="m-0 text-center">votre recherche</p>
      </div>
      <div class="contentForm p-3">
        <div class="form-group mb-3">
          <label for="destination">Votre Voyage</label>
          <select class="form-control" name="id_city" id="destination">
            <option>
              <?php 
            $hotel = new hotel($dbh,$formatString);
            $hotel->getListCity();

            foreach ($hotel->tblCities as $city) {
              echo '<option value="'.$city['id'].'">'.$city['name'].'</option>';
            } 
            ?>  

              
            </option>


          </select>
        </div>
        <div class="form-group mb-3">
          <select class="form-control">
            <option></option> 
          </select>
        </div>
        <div class="form-group mb-3">
          <label for="exampleInputEmail1">Date de départ</label>
          <div class="input-group flex-nowrap">
            <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">@</span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="exampleInputEmail1">Date de retour</label>
          <div class="input-group flex-nowrap">
            <input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
            <div class="input-group-prepend">
              <span class="input-group-text" id="addon-wrapping">@</span>
            </div>
          </div>
        </div>
        <div class="mt-4">
          <button class="btn btnPays w-100 text-uppercase text-light">Chercher</button>
        </div>
      </div>
    </form>
  </div>

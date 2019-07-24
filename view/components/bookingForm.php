<div class="bookingForm col-lg-6 p-0 formA ownShadow">
	<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active btn-primary" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Hôtel</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link btn-primary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Vol</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link btn-primary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Hôtel + Vol</a>
	  </li>
	</ul>
	<div class="tab-content" id="pills-tabContent">
	  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
	  	<form class="p-4" action="index.php?controller=pages&action=reservations" method="post">
			<div class="row">
			<div class="form-group col-lg-4 mb-3">
				<label for="destination">Votre Voyage</label>
				<input type="text" id="search" data-letters="letters" autocomplete="off">
				<div id ="selectDep">
				<!-- Retour AJAX dans cette div -->
				</div>

			</div>

			<div class="form-group col-lg-4 mb-3">
					<label for="exampleInputEmail1">Votre Voyage</label>
					<div class="input-group flex-nowrap">
					<input type="date" required name="date_in" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
					<div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping">@</span>
					</div>
				</div>
			</div>
			<div class="form-group col-lg-4 mb-3">
					<label for="exampleInputEmail1">Votre Voyage</label>
					<div class="input-group flex-nowrap">
					<input type="date" required name="date_out" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
					<div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping">@</span>
					</div>
				</div>
			</div>
				
				<div class="form-group col-lg-4 mb-3">
				<select name="airportArr" class="form-control" id="toto">
					<option selected disabled="">Arrivée</option>
					<?php 
						foreach ($listAirports as $airport) {
								echo '<option value="'.$airport['id'].'">'.$airport['cityName'].'-'.$airport['airportName'].'</option>';
						} 
	        ?>  
				</select>
			</div>
			</div>
			<div class="text-right mt-4">
				<button class="btn btn-primary text-uppercase">Chercher</button>
			</div>
		</form>
	  </div>
	  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
	  	<form class="p-4">
			<div class="row">
			<div class="form-group col-lg-4 mb-3">
					<label for="destination">Votre Voyage</label>
				<select class="form-control" id="destination">
					<option>Paris</option>
					<option>Bruxelles</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
			<div class="form-group col-lg-4 mb-3">
					<label for="exampleInputEmail1">Votre Voyage</label>
					<div class="input-group flex-nowrap">
					<input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
					<div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping">@</span>
					</div>
				</div>
			</div>
			<div class="form-group col-lg-4 mb-3">
					<label for="exampleInputEmail1">Votre Voyage</label>
					<div class="input-group flex-nowrap">
					<input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
					<div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping">@</span>
					</div>
				</div>
			</div>
				
				<div class="col-lg-4 mb-3">
				<select class="form-control">
					<option>Los Angeles</option>
					<option>London</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				</div>
			</div>
			<div class="text-right mt-4">
				<button class="btn btn-primary text-uppercase">Chercher</button>
			</div>
		</form>
	  </div>
	  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
	  	<form class="p-4">
			<div class="row">
			<div class="form-group col-lg-4 mb-3">
					<label for="destination">Votre Voyage</label>
				<select class="form-control" id="destination">
					<option>Paris</option>
					<option>Bruxelles</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
			</div>
			<div class="form-group col-lg-4 mb-3">
					<label for="exampleInputEmail1">Votre Voyage</label>
					<div class="input-group flex-nowrap">
					<input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
					<div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping">@</span>
					</div>
				</div>
			</div>
			<div class="form-group col-lg-4 mb-3">
					<label for="exampleInputEmail1">Votre Voyage</label>
					<div class="input-group flex-nowrap">
					<input type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
					<div class="input-group-prepend">
						<span class="input-group-text" id="addon-wrapping">@</span>
					</div>
				</div>
			</div>
				<div class="col-lg-4 mb-3">
				<select class="form-control">
					<option>Los Angeles</option>
					<option>London</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
				</select>
				</div>
			</div>
			<div class="text-right mt-4">
				<button class="btn btn-primary text-uppercase">Chercher</button>
			</div>
		</form>
	  </div>
	</div>
</div>
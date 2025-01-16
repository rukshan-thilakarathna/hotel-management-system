<x-app-layout>
    <!-- Hero Section -->
  <div class="bg-dark text-white text-center d-flex align-items-center justify-content-center" style="background-image: url('{{ asset('images/dining.jpg') }}'); background-size: cover; background-position: center; height: 500px;">
    <h1 class="fw-bold text-uppercase bg-opacity-75 bg-dark p-2 font3" style="color:white; font-size:55px;">Multi Cuisine Restaurant</h1>
  </div>
  

  <!-- Text Section -->
  <div class="container text-center my-5 font3">
    <h2 class="fw-bold" style="font-size:30px;">Fresh ingredients, Bold flavors, Unforgettable dining</h2>
    <p class="text-muted" style="margin-top: 20px;">
      Lorem ipsum dolor sit amet consectetur. Curabitur velit elementum ut pretium duis ultricies massa. Quis dui vitae eu nulla volutpat neque egestas. Ut arcu feugiat eu nunc ornare amet non. Condimentum nisl ultrices justo sociis donec. Urna ac neque arcu nulla vel mauris nisl euismod faucibus.
    </p>
  </div>

  <!-- Menu Cards Section -->
  <div class="container my-5 text-center font3">
    <div class="row g-4" style="font-size:25px;">
      <!-- Card 1 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/Rice & Curry.jpg') }}" class="img-fluid" alt="Rice & Curry">
        <p class="mt-2">Rice & Curry</p>
      </div>
      <!-- Card 2 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/kiribath.jpg') }}" class="img-fluid" alt="Kiribath">
        <p class="mt-2">Kiribath</p>
      </div>
      <!-- Card 3 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/Kottu Roti.jpg') }}" class="img-fluid" alt="Kottu Roti">
        <p class="mt-2">Kottu Roti</p>
      </div>
      <!-- Card 4 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/Indiappa.jpg') }}" class="img-fluid" alt="Indiappa">
        <p class="mt-2">Indiappa</p>
      </div>
      <!-- Card 5 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/Hoppers.jpg') }}" class="img-fluid" alt="Hoppers">
        <p class="mt-2">Hoppers</p>
      </div>
      <!-- Card 6 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/Pol Roti.jpg') }}" class="img-fluid" alt="Pol Roti">
        <p class="mt-2">Pol Roti</p>
      </div>
      <!-- Card 7 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/Lamprais.jpg') }}" class="img-fluid" alt="Lamprais">
        <p class="mt-2">Lamprais</p>
      </div>
      <!-- Card 8 -->
      <div class="col-md-3 col-sm-6">
        <img src="{{ asset('images/Pol Sambal.jpg') }}" class="img-fluid" alt="Pol Sambal">
        <p class="mt-2">Pol Sambal</p>
      </div>
    </div>
    <!-- See More Button -->
    <div class="mt-4">
      <a href="#" class="btn btn-success new-btn-color">See More</a>
    </div>
  </div>

</x-app-layout>
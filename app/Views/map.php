<!--Start map-->
<section class="ftco-section testimony-section bg-light section-body" id="gmap">
  <div class="container">
    <div class="col-md-7 heading-section ftco-animate">
      <span class="subheading"></span>
      <h2 class="mb-4"><strong>Your</strong> Destination </h2>
    </div>

    <div class="row justify-content-start">
      <div class="col-md-5 heading-section ftco-animate">
        <div class="borbon">
          <div class="monteros">
            <h1>Bantayan Island</h1>

<div id="map" style="height: 440px;"></div>

<script>
let map;

function initMap() {

  const myLatLng = { lat: 11.1999, lng: 123.7406 };
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 11.5,
    center: myLatLng,
  });

  new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Hello World!",
  });
}

window.initMap = initMap;
</script>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt0QkHQibktWoundCzyx0gN6mSBVXtHEE&callback=initMap&v=weekly"
      defer
    ></script>
			  
			  
			  
			  </div>
        </div>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-6 heading-section ftco-animate">
        <h2 class="mb-4 pb-3">Address</h2>
        </form><br>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="item">
              <div class="testimony-wrap d-flex">

                <div class="text ml-md-4">
                  <p class="mb-5">4th district of Cebu,
                    Central Visayas, Santa Fe.</p>
                  <hr>
                  <p class="name">6052</p>
                  <span class="position">Bantayan, Cebu</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<br>
<!--end map-->
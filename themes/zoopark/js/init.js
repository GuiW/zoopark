(function($){
  $(function(){

    $('.button-collapse').sideNav();
    $('.parallax').parallax();


    //Toggle telephone
    $('#test5').on('change', function() {
      var tel = $('#icon_telephone');
      var telSib = $('#icon_telephone').siblings();
      var isDisabled = tel.prop('disabled');

      if(isDisabled) {
        tel.prop('disabled', false);
        tel.val("");
        telSib.removeClass("active");
      }
      else {
        tel.prop('disabled', true);
        tel.val("I am not editable")
        telSib.addClass("active");
        tel.removeClass("valid");
      }
    })


/******************************************************************************/
/**************************** GEOLOCALISATION *********************************/
//Variables globales
var rayon = 10;
var etat = "offline";
var posLat = "";
var posLong = "";
var latMax = "";
var latMin = "";
var longMax = "";
var longMin = "";

function Geolocalisation() {
  var optionsGeo = {
    enableHighAccuracy: true,
    timeout: 12000, //Durée avant affichage d'erreur
    maximumAge: 600 //Durée de mise en cache de la position
  }
  navigator.geolocation.getCurrentPosition(successGeo, errorGeo, optionsGeo);
}

function successGeo(pos) {
  crd = pos.coords;
  console.log("Latitude : "+crd.latitude)
  console.log("Latitude : "+crd.longitude)
  posLat = crd.latitude;
  posLong = crd.longitude;
  CalculCoordo(crd);
}

function errorGeo(err) {
  console.log(err);
}

function CalculCoordo (crd){
  ratio_lat = 1/111*rayon;
  latMin = crd.latitude - ratio_lat;
  latMax = crd.latitude + ratio_lat;
  console.log("lat : "+latMin+"/"+latMax);
  //long 1° = 5*111*Math.cos(lat_actuelle);
  ratio_long = rayon/111*Math.cos(crd.latitude);
  longMin = crd.longitude - ratio_long;
  longMax = crd.longitude + ratio_long;
  console.log("long : "+longMin+"/"+longMax);
  listingStations();
}

/******************************************************************************/    

  }); // end of document ready
})(jQuery); // end of jQuery name space
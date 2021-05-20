//Initialize map variable
var map

//Initialize map function
function initMap() {

  //Initialize variables with relevant information.
  //
  //AKAME: 44.773538071996114, -91.43470155923839
  //ADDR: 4056 Commonwealth Ave, Eau Claire, WI 54701
  //DIR: https://goo.gl/maps/yp8o6VkWW7wosfJq6

  var akame = {
    info:
      '<strong>Akame Sushi</strong><br>\
      4056 Commonwealth Ave, Eau Claire, WI 54701<br>\
          <a href="https://www.google.com/maps?saddr=My+Location&daddr=4056+Commonwealth+Ave+EauClaire+WI+54701">Get Directions</a>',
    lat: 44.773538071996114,
    long: -91.43470155923839,
  }

  //RAMONES: 44.81475894147593, -91.49994784574483
  //ADDR: 503 Galloway St, Eau Claire, WI 54703
  //DIR: https://goo.gl/maps/3VthZns4sACYQ82S9

  var ramone = {
    info:
      '<strong>Ramones Ice Cream Parlor</strong><br>\
      503 Galloway St, Eau Claire, WI 54703<br>\
      <a href="https://www.google.com/maps?saddr=My+Location&daddr=503+Galloway+Street+EauClaire+WI+54703">Get Directions</a>',
    lat: 44.81475894147593,
    long: -91.49994784574483,
  }

  //MCDONALDS: 44.803594048771515, -91.46976918165088
  //ADDR: 1513 S Hastings Way, Eau Claire, WI 54701
  //DIR: https://goo.gl/maps/ftoeDGLjStb5kxoT9
  var mcdonalds = {
    info:
      '<strong>McDonalds</strong><br>\
      1513 S Hastings Way, Eau Claire, WI 54701<br>\
      <a href="https://www.google.com/maps?saddr=My+Location&daddr=1513+South+Hastings+Way+EauClaire+WI+54701">Get Directions</a>',
    lat: 44.803594048771515,
    long: -91.46976918165088,
  }

  //Add each location to our locations array
  var locations = [
    [akame.info, akame.lat, akame.long, 0],
    [mcdonalds.info, mcdonalds.lat, mcdonalds.long, 1],
    [ramone.info, ramone.lat, ramone.long, 2],
  ];

  //Set map values, zoom to 13, center on Eau Claire lat long, set maptype. 
  //EC LAT/LONG: 44.803604, -91.483597
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 13,
    center: new google.maps.LatLng(44.803604, -91.483597),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
  });

//Initialize our info window variable
var infowindow = new google.maps.InfoWindow({});

//Prepare marker variable and our for loop i variable
var marker, i;

//Dynamically update the number of "markers" by utilizing the 
//length of the locations variable to set our condition
for (i = 0; i < locations.length; i++) {
  marker = new google.maps.Marker({
    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    map: map,
  });

  //Display content of our info window's when the user clicks the 
  //respective marker. 
  google.maps.event.addListener(
    marker,
    'click',
    (function (marker, i) {
      return function () {
        infowindow.setContent(locations[i][0])
        infowindow.open(map, marker)
      }
    })(marker, i)
  );
}
}
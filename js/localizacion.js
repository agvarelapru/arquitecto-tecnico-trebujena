
 
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else { 
                alert("Geolocalizacion no soportada por su navegador."); 
                document.getElementById("latitud").value=0;
                document.getElementById("longitud").value=0; 
            }
        }
        
        function showPosition(position) {
    document.getElementById("latitud").value=position.coords.latitude;
    document.getElementById("longitud").value=position.coords.longitude; 
    }

/*
function myMap() {
  var myCenter = new google.maps.LatLng(loc);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
*/



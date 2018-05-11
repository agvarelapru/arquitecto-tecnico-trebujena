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

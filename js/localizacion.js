
/* funcion pra obtener coordenadas de localizacion*/

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

window.onload = function(){
document.getElementById("pass").addEventListener('blur',comprueba,false);
document.getElementById("pass2").addEventListener('blur',comprueba,false);
document.getElementById("provincia").addEventListener('change',muestraMunicipios,false);

  document.getElementById("enviar").addEventListener('click',pass,false);

    }



/*funcion para comprobar que las contraseñas sean iguales*/
function comprueba(){
var pass=document.getElementById('pass').value;
var pass2=document.getElementById('pass2').value;


if(pass!=pass2){

  document.getElementById('error').innerHTML="Repetir Contraseña   <IMG SRC='../img/error.png'>";

}else{
document.getElementById('error').style.color='#f05f40';
  document.getElementById('error').innerHTML="Repetir Contraseña   <IMG SRC='../img/bien.png'>";
}
}

/* ajax para mostrar municipios */

function muestraMunicipios() {
  var str=document.getElementById("provincia").value;

   if (str == "") {
       document.getElementById("poblaciones").innerHTML = "";
       return;
   } else {
       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {

           if (this.readyState == 4 && this.status == 200) {

             option="";
       var respuesta_json = xmlhttp.responseText;

     var objeto_json = eval("("+respuesta_json+")");

     var municipios=objeto_json.municipios;

for(var x=0;x<municipios.length;x=x+2){
                      option+="<option value="+municipios[x]+">"+municipios[x+1]+"</option>";

                  }


            document.getElementById("poblaciones").innerHTML =option;
document.getElementById('provi').style.color='#f05f40';
  document.getElementById('pobla').style.color='#f05f40';
           }
       };
       xmlhttp.open("GET","../biblioteca/poblaciones.php?q="+str,true);
       xmlhttp.send();

   }
}





/* funcion para validacion de contraseña y selects*/

function pass(eventoClick){
var pass=document.getElementById('pass').value;
var pass2=document.getElementById('pass2').value;
var pro=document.getElementById('provincia').value;
var pob=document.getElementById('poblaciones').value;

if(pro=="" || pro==null){

eventoClick.preventDefault();
document.getElementById('provi').style.color="red";
document.getElementById('provi').innerHTML="Indique su provincia";
}
if(pob=="" || pob==null){

eventoClick.preventDefault();
document.getElementById('pobla').style.color="red";
document.getElementById('pobla').innerHTML="Indique su poblacion";
}

if(pass!=pass2){
eventoClick.preventDefault();
document.getElementById('error').style.color="red";
document.getElementById('error').innerHTML="Las contraseñas deben de ser iguales";
}
}

/*
window.onload = function(){

document.getElementById("getuser").addEventListener('change',muestraEncargos,false);

    }
*/
/* ajax para mostrar municipios */

function muestraEncargos() {
  document.getElementById("tipo").innerHTML ="";
            document.getElementById("honorarios").value="";
  var str=document.getElementById("getuser").value;

   if (str == "") {
       document.getElementById("getencargo").innerHTML = "";
       return;
   } else {

       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
xmlhttp2 = new XMLHttpRequest();
       } else {
           // code for IE6, IE5
           xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
       }
       xmlhttp.onreadystatechange = function() {

           if (this.readyState == 4 && this.status == 200) {

             option="<option value='#'>--Selecione un encargo--</option>";
       var respuesta_json = xmlhttp.responseText;

     var objeto_json = eval("("+respuesta_json+")");

     var encargos=objeto_json.encargos;

for(var x=0;x<encargos.length;x=x+2){
                      option+="<option value="+encargos[x]+">"+encargos[x+1]+"</option>";

                  }


            document.getElementById("getencargo").innerHTML =option;
document.getElementById('us').style.color='#f05f40';
  document.getElementById('encar').style.color='#f05f40';
           }
       };
       xmlhttp.open("GET","biblioteca/encargos.php?q="+str,true);
       xmlhttp.send();



       xmlhttp2.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {


       var respuesta_json2 = xmlhttp2.responseText;

     var objeto_json2 = eval("("+respuesta_json2+")");

     var clientes=objeto_json2.clientes;

  document.getElementById("nombre").value =clientes[0]+" "+clientes[1]+" "+clientes[2];
  //document.getElementById("apellido1").value =clientes[1];
  //document.getElementById("apellido2").value =clientes[2];
    //document.getElementById("nif").value =clientes[3];

            //document.getElementById("getencargo").innerHTML =option;
  document.getElementById('us').style.color='#f05f40';
  document.getElementById('encar').style.color='#f05f40';
           }


       };

       xmlhttp2.open("GET","biblioteca/clientes.php?q="+str,true);
       xmlhttp2.send();




  }
}





function muestraDatos() {

  var str=document.getElementById("getencargo").value;

   if (str == "") {
       document.getElementById("getencargo").innerHTML = "";
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

     var encargos=objeto_json.encargos;
var trabajo=encargos[0];

            var importe=document.getElementById("honorarios").value=encargos[1]+" €";
            document.getElementById("pagado").value=encargos[5]+" €";

  trabajo+=" sito en "+encargos[2]+", de "+encargos[3]+" ("+encargos[4]+").";
document.getElementById("tipo").innerHTML =trabajo;


           }
       };
       xmlhttp.open("GET","biblioteca/encargos2.php?q="+str,true);
       xmlhttp.send();

   }
}

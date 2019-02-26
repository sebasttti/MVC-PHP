var btn_cargar = document.getElementById('btn_cargar_usuarios');
var error_box = document.getElementById('error_box');
var tabla = document.getElementById('tabla');
var loader = document.getElementById('loader');
var formulario = document.getElementById('formulario');
var usuario_nombre, usuario_edad, usuario_pais, usuario_correo;
var url=window.location.href;

function cargarUsuarios(){
  tabla.innerHTML = "<tr><th>Id</th><th>Nombre</th><th>Edad</th><th>Pais</th><th>Correo</th></tr>";
  var actualUrl = url + "/leerdatos"

  var peticion = new XMLHttpRequest;
  peticion.open('GET', actualUrl);
  peticion.send();
  loader.classList.add('active');

  peticion.onreadystatechange=function(){
      if (peticion.readyState==4 && peticion.status==200) {
          loader.classList.remove('active');
      }
  }

  peticion.onload=function(){
     var datos = JSON.parse(peticion.responseText);
     if (datos.error) {
        error_box.classList.add('active');
     }else{
        for (var i = 0; i < datos.length; i++) {
              var elemento = document.createElement("tr");
              elemento.innerHTML += ("<td>"+datos[i].id+"</td>");
              elemento.innerHTML += ("<td>"+datos[i].nombre+"</td>");
              elemento.innerHTML += ("<td>"+datos[i].edad+"</td>");
              elemento.innerHTML += ("<td>"+datos[i].pais+"</td>");
              elemento.innerHTML += ("<td>"+datos[i].correo+"</td>");
              document.getElementById('tabla').appendChild(elemento);
        }
     }
  };

};

function agregarUsuario(e){
  e.preventDefault();

  var actualUrl = url + "/agregardatos"

  loader.classList.add('active');

  var peticion = new XMLHttpRequest;
  peticion.open('POST',actualUrl);

  usuario_nombre = formulario.nombre.value.trim();
  usuario_edad = parseInt(formulario.edad.value.trim());
  usuario_pais = formulario.pais.value.trim();
  usuario_correo = formulario.correo.value.trim();

  var parametros = "nombre="+usuario_nombre+"&edad="+usuario_edad+"&pais="+usuario_pais+"&correo="+usuario_correo;
  peticion.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  peticion.send(parametros);

  peticion.onreadystatechange=function(){
      if (peticion.readyState==4 && peticion.status==200) {
          console.log("información subida con exito");
          loader.classList.remove('active');
      }
  }

  peticion.onload = function(){
      //console.log(peticion.responseText);
      var $respuesta_add = JSON.parse(peticion.responseText);
      //console.log($respuesta_add);

      if ($respuesta_add.error) {
        console.log("estoy obteniendo un error");
        error_box.classList.add('active');
      }else{
        cargarUsuarios();
      }
  }
  formulario.nombre.value = "";
  formulario.edad.value = "";
  formulario.pais.value = "";
  formulario.correo.value = "";
};

btn_cargar.addEventListener('click',function(){
    cargarUsuarios();
});

formulario.addEventListener('submit',function(e){
  agregarUsuario(e);
});

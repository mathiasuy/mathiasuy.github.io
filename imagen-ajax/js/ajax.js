// Función para recoger los datos de PHP según el navegador, se usa siempre.
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
 
	try {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (E) {
		xmlhttp = false;
	}
}
 
if (!xmlhttp && typeof XMLHttpRequest!=='undefined') {
	  xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}



//Función para recoger los datos del formulario y enviarlos por post  
function enviarDatos(){
 
  //div donde se mostrará lo resultados
  divResultado = document.getElementById('resultado');
  //recogemos los valores de los inputs
  nombre=document.registro.nombre.value;
  documento=document.registro.documento.value;
  email=document.registro.email.value;
  password=document.registro.password.value;
 
   //instanciamos el objetoAjax
  ajax=objetoAjax();
 
  //uso del medotod POST
  //archivo que realizará la operacion
  //registro.php
  ajax.open("POST", "registro.php",true);
  		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
	  ajax.onreadystatechange=function() {
		  //la función responseText tiene todos los datos pedidos al servidor
	  	if (ajax.readyState===4) {
	  		//mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText;
	  		//llamar a funcion para limpiar los inputs
			LimpiarCampos();
		}
 	};
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("nombre="+nombre+"&documento="+documento+"&email="+email+"&password="+password);
}
 
function del(doc){
      divResultado = document.getElementById('resultado');
    ajax=objetoAjax();
     ajax.open("POST", "borrar.php",true);
  		//cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
	  ajax.onreadystatechange=function() {
		  //la función responseText tiene todos los datos pedidos al servidor
	  	if (ajax.readyState===4) {
	  		//mostrar resultados en esta capa
			divResultado.innerHTML = ajax.responseText;
	  		//llamar a funcion para limpiar los inputs
		}
 	};
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//enviando los valores a registro.php para que inserte los datos
	ajax.send("documento="+doc);
};

//función para limpiar los campos
function LimpiarCampos(){
  document.registro.nombre.value="";
  document.registro.documento.value="";
  document.registro.email.value="";
  document.registro.password.value="";
  document.getElementById("image").innerHTML = "";
  //document.registro.nombre.focus();
};
// Wait for the DOM to be ready
$(function() {

jQuery.validator.addMethod("filesize", function (val, element) {
    var size = element.files[0].size;
    console.log(size + ">");
    console.log(1024*15)
    return !(size > 1024*15*1024);
}, "El tamaño del archivo no puede superar los 15MB");

jQuery.validator.setDefaults({
    errorClass: 'invalid',
    validClass: "valid",
    //mensaje de error, elemento con el error, se ejecuta para cada uno cuando hay error
    errorPlacement: function (error, element) {
        $(element)
            .closest("form")
            .find("label[for='" + element.attr("id") + "']")
            .attr('data-error', error.text());
//document.getElementById('image').innerHTML += " label[for='" + element.attr("id") + "']" + error.text();
    },
});  

  //inicializa la validacion del form "registro"
  $("form[name='registro']").validate({
    //Reglas  de validacion
    rules: {
        //a la izquierda, id del control, a la derecha validacion
      nombre: "required",
      documento: {
        required: true,
        number : true,
        minlength : 8
        
      },
      email: {
        required: true,
          //usando validador de email del plugin
        email: true
      },
      password: {
        required: true,
        minlength: 5
      },
      file:{
        required: true,
        extension: "jpg|png|gif|jpeg",
        filesize: true
      }
    },
    //mensajes de error para cada  regla
     messages: {
          nombre: "Debe introducir su nombre.",
          documento: {
            required : "Debe introducir su documento",
            minlength : "Debe tener al menos 8 digitos sin puntos ni guiones y con digito verificador",
            number : "Solo se permiten números"
          },
          password: {
            required: "Proporcione una contraseña",
            minlength: "La clave debe tener al menos 5 caracteres"
          },
          email: "Proporcione un email válido",
          file: {
            required : "¡Falta seleccionar la foto! debe ser jpg|png|gif|jpeg",
            extension : "Extensiones permitidas: jpg|png|gif|jpeg"
          }
    },
    submitHandler: function(form) {
      enviarDatos();
      //subir();
            doc = document.getElementById("documento").value;
            var formData = new FormData($("#registro")[0]);
            var ruta = "imagen-ajax.php?documento="+doc;
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function(){
                    $('#loading').show();
                },
                complete: function(){
                    $('#loading').hide();
                },                
                success: function(datos)
                {
                   //$("#respuesta").html(datos);
                    //document.getElementById("respuesta").innerHTML += 'Datos enviados correctamente.';
                }
            });      
      
    }
  });
});
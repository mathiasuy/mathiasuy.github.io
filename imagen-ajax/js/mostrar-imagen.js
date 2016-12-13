$(window).load(function(){

    //document.getElementById("imgSalida").hidden();
  //document.getElementById('imgSalida').style.display = "show";

 $(function() {
        //agrega el evento a el control
        $('#file').change(function(e) {
            addImage(e); 
           });

        /**
         * agrega la imagen tras detectarse el evento de arriba
         * */
        function addImage(e){
            var file = e.target.files[0],
            imageType = /image.*/;

            var reader = new FileReader();
            reader.onload = fileOnload;
            if (file !== null){
                if (!file.type.match(imageType)){
                    document.getElementById('image').innerHTML = "";
                    return;
                }              
              reader.readAsDataURL(file);
            }else{
                document.getElementById('image').innerHTML = "";
            }
        }

        function fileOnload(e) {
            var result=e.target.result;
            document.getElementById('image').innerHTML = '<img id="imgSalida" width="50%" height="50%" src='+result+'    />';
        }
    });
  });
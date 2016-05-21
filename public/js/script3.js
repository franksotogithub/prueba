/**
 * Created by Administrador on 17/05/2016.
 */
$(document).on('click','.pagination a',function(e){//hace referencia a la clase pagination <div class=pagination>  y al link <a>
   e.preventDefault();//prevenimos que el documento desencadene una accion
    var page=$(this).attr('href').split('page=')[1]; //hacemos referencia al atributo href <a href="/sdsd/ds"></a>

    var route="http://localhost:8090/prueba/public/usuario";
    //conlose.log(page);
    $.ajax({
        url:route,
        data:{page:page},
        type:'GET',
        dataType:'json',
        success: function (data){
            console.log(data);
            $(".users").html(data);
        }

    });


});
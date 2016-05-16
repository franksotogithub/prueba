/**
 * Created by Administrador on 16/05/2016.
 */
$(document).ready(function()
{

Carga();
});


function Carga()

{
    var tablaDatos = $("#datos");

    var route = "http://localhost:8090/prueba/public/generos";
    tablaDatos.empty();
    $.get(route, function (res) {
        $(res).each(
            function (key, value) {
                tablaDatos.append("<tr><td>" + value.genero + "</td><td> <button value=" + value.id + " Onclick='Mostrar(this)' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button> </button></td> <td> <button class='btn btn-danger'>Eliminar</button> </button></td></tr>");
            }
        );
    });


}
function Mostrar(btn){

//console.log(btn.value);
var route="http://localhost:8090/prueba/public/genero/"+btn.value+"/edit";
$.get(route,function(res){
        $('#genre').val(res.genero);
        $('#id').val(res.id);


    });



}

$("#actualizar").click(function(){
    var value=$('#id').val();
    var dato=$('#genre').val();
    var route="http://localhost:8090/prueba/public/genero/"+value+"";
    var token=$("#token").val();
    $.ajax({
     url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:'PUT',
        datype:'json',
        data:{genero:dato},
        success:function(){

            Carga();
        $("#myModal").modal('toggle');
        $("#msj-success").fadeIn();
        }
    });



});
/**
 * Created by Administrador on 16/05/2016.
 */
$('#registro').click(
function()
{
    var dato=$('#genre').val();
   // alert(dato);
    var route='http://localhost:8090/prueba/public/genero';
    var token=$("#token").val();
    $.ajax({
        url: route,
        headers:{'X-CSRF-TOKEN':token},
        type: 'POST',
        dataType:'json',
        data:{genero:dato},
        success:function(){
            $('#msj-success').fadeIn();

        }
    });

}

);
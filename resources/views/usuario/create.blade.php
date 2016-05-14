<!-- Aqui se define de que template esta heredando esta vista-->
@extends('layaouts.admin')
<!---- Todo el codigo a partir de aqui es incrustado en el template---->
@section('content')
        <!--Aqui incluye la alerta mostrando todos los errores de validacion que se encuentra en alerts/request.blade.php-->
@include('alerts.request')
    {!! Form::open(['route'=>'usuario.store','method'=>'POST']) !!} <!--Aqui se define que al hacer click al boton este se redirecciona al metodo store del UsuarioController pasando los valores mediate POST-->
        @include('usuario.forms.usr') <!--Introducimos el formulario definido en usuario/forms/usr.blade.php-->
        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
<!--
    <form action="">
        <div class="form-group">
        <label form="">Nombre</label>
          <input type="text" class="form-control" >

        </div>

        <div class="form-group">

            <label form="">Correo</label>
            <input type="text" class="form-control" >

        </div>


        <div class="form-group">

            <label form="">Contraseña</label>
            <input type="password" class="form-control" >

        </div>

        <button class="btn btn-primary "></button>


    </form>
-->
@stop
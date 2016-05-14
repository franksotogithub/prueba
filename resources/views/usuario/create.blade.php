@extends('layaouts.admin')
@section('content')

    {!! Form::open(['route'=>'usuario.store','method'=>'POST']) !!}
        @include('usuario.forms.usr') <!--Introducimo el formulario definido en usuario/forms/usr.blade.php-->
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
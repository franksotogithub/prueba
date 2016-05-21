@extends('layaouts.admin')
@section('content')
    {!! Form::open() !!}
    <div id="msj-success" class="alert alert-success alert-dismissable" role="alert" style="display:none" >

<strong>Usuario creado correctamente</strong>
    </div>


    <div id="msj-error" class="alert alert-danger alert-dismissable" role="alert" style="display:none ">

    </div>

<input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
@include('genero.form.genero')
{!! link_to('#',$title='Registrar',$atributes=['id'=>'registro','class'=>'btn btn-primary'],$secure=null) !!}
{!! Form::close() !!}
@endsection
@section('scripts')
{!! Html::script('js/script.js') !!}
    @endsection
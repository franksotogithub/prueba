@extends('layaouts.admin')
@section('content')
    @include('genero.modal')
    <div id="msj-success" class="alert alert-success alert-dismissable" role="alert" style="display:none ">
    <strong>Genero actualizado correctamente</strong>

    </div>

    <div id="msj-success-delete" class="alert alert-success alert-dismissable" role="alert" style="display:none ">
        <strong>Genero eliminado correctamente</strong>

    </div>

    <table class="table">
        <thead>
        <th>Nombre</th>
        <th>Operaciones</th>
        </thead>
        <tbody id="datos">

        </tbody>
    </table>
@endsection

@section('scripts')
    {!! Html::script('js/script2.js') !!}
@endsection
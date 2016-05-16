@extends('layaouts.admin')
@section('content')
{!! Form::open() !!}
@include('genero.form.genero')
{!! Form::close() !!}
@endsection
@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $semestre->id }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($semestre, array('route' => array('semestre.update', $semestre->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('tipo', 'Tipo:') }}
        {{ Form::text('tipo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('inicio', 'Ínicio:') }}
        {{ Form::text('inicio', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('fim', 'Fim:') }}
        {{ Form::text('fim', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('texto', 'Descrição:') }}
        {{ Form::text('texto', null, array('class' => 'form-control')) }}
    </div>

    

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
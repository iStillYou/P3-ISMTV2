@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $emprego->empresa }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($emprego, array('route' => array('emprego.update', $emprego->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('data', 'Data:') }}
        {{ Form::text('data', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('empresa', 'Empresa:') }}
        {{ Form::text('empresa', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('funcao', 'Função:') }}
        {{ Form::text('funcao', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('localizacao', 'Localização:') }}
        {{ Form::text('localizacao', null, array('class' => 'form-control')) }}
    </div>
    

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $docente->nome }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($docente, array('route' => array('docentes.update', $docente->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('nome', 'Nome completo:') }}
        {{ Form::text('nome', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('professor', 'Categoria profissional:') }}
        {{ Form::text('professor', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>

    
    

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
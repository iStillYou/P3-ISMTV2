@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $horario->texto }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($horario, array('route' => array('horarios.update', $horario->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('diasemana', 'Dia da Semana:') }}
        {{ Form::text('diasemana', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('hora', 'Hora (Ínicio - Fim):') }}
        {{ Form::text('hora', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('texto', 'Aula:') }}
        {{ Form::text('texto', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('anoLetivo', 'Ano (1º, 2º, 3º):') }}
        {{ Form::select('anoLetivo', array('1' => '1', '2' => '2', '3' => '3'), null, array('class' => 'form-control')) }}
    </div>
    

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
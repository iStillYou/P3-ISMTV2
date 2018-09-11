@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $exame->id }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($exame, array('route' => array('exames.update', $exame->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('anoEscolar', 'Ano Escolar(1º,2º,3º):') }}
        {{ Form::select('anoEscolar', array('1º' => '1º', '2º' => '2º', '3º' => '3º'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('unidadeCurricular', 'Unidade Curricular:') }}
        {{ Form::text('unidadeCurricular', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('docente', 'Docente:') }}
        {{ Form::text('docente', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('epocanormal', 'Época Normal:') }}
        {{ Form::text('epocanormal', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('dianormal', 'Dia Normal:') }}
        {{ Form::text('dianormal', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('horanormal', 'Hora Normal:') }}
        {{ Form::text('horanormal', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('salanormal', 'Sala Normal:') }}
        {{ Form::text('salanormal', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('epocarecurso', 'Época Recurso:') }}
        {{ Form::text('epocarecurso', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('diarecurso', 'Dia Recurso:') }}
        {{ Form::text('diarecurso', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('horarecurso', 'Hora Recurso:') }}
        {{ Form::text('horarecurso', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('salarecurso', 'Sala Recurso:') }}
        {{ Form::text('salarecurso', null, array('class' => 'form-control')) }}
    </div>

    

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
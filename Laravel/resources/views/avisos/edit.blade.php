@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $aviso->aviso }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($aviso, array('route' => array('avisos.update', $aviso->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('aviso', 'Aviso') }}
        {{ Form::text('aviso', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tipo', 'Tipo') }}
        {{ Form::select('tipo', array('0' => 'Geral', '1' => 'Restrito'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('texto', 'Texto') }}
        {{ Form::text('texto', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
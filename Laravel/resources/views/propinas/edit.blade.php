@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $propina->id }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($propina, array('route' => array('propinas.update', $propina->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('anoLetivo', 'Ano Letivo:') }}
        {{ Form::text('anoLetivo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('dataLimite', 'Data de Limite:') }}
        {{ Form::date('dataLimite', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('tipoDePagamento', 'Tipo de Pagamento:') }}
        {{ Form::text('tipoDePagamento', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('valor', 'Valor:') }}
        {{ Form::text('valor', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('estado', 'Estado:') }}
        {{ Form::select('estado', array('1' => 'A pagamento', '2' => 'Em atraso'), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('idUtilizador', 'Utilizador:') }}
        {{ Form::select('idUtilizador', $utilizadores, null, array('class' => 'form-control')) }}
    </div>

    
    

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
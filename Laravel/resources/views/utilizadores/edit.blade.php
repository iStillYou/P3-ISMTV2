@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $utilizadores->username }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($utilizadores, array('route' => array('utilizadores.update', $utilizadores->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('username', 'Nome do utlizador') }}
        {{ Form::text('username', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Senha') }}
        {{ Form::password('password', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('privilegio', 'Privilégio') }}
        {{ Form::select('privilegio', array('0' => 'Aluno', '1' => 'Professor'), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
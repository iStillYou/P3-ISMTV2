@extends('layouts.master')
@section('content')

<div class="form-group row">
<div class="col-sm-4"></div>

<div class="col-md-6">
<h2>Edit {{ $noticia->titulo }}</h2>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($noticia, array('route' => array('noticias.update', $noticia->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('titulo', 'Titulo') }}
        {{ Form::text('titulo', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('texto', 'Texto') }}
        {{ Form::textarea('texto', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('data', 'Data') }}
        {{ Form::text('data', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('imagem', 'Imagem') }}
        {{ Form::file('imagem', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Submeter', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
</div>
</div>

@stop
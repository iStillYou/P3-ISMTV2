@extends('layouts.master')
@section('content')
<form action="{{ URL::route('noticias.store') }}" method="post" enctype="multipart/form-data">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Criar notícia
</div>
</div>

<div class="form-group row">
<label for="titulo" class="col-sm-4 col-form-label text-md-right">Titulo:</label>
<div class="col-md-6">
<input type="text" id="titulo" class="form-control" name="titulo"><br>
</div>
</div>

<div class="form-group row">

<label for="texto" class="col-sm-4 col-form-label text-md-right">Texto:</label>
<div class="col-md-6">
<textarea id="texto" class="form-control" name="texto"></textarea><br>
</div>
</div>

<div class="form-group row">
<label for="data" class="col-sm-4 col-form-label text-md-right">Data:</label>
<div class="col-md-6">
<input type="text" id="data" class="form-control" name="data"><br>
</div>
</div>

<div class="form-group row">
<label for="imagem" class="col-sm-4 col-form-label text-md-right">Imagem:</label>
<div class="col-md-6">
<input type="file" id="imagem" class="form-control" name="imagem"><br>
</div>
</div>

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-sm-6">
<input type="submit" class="btn btn-info">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
</div>
</div>
</form>
@stop
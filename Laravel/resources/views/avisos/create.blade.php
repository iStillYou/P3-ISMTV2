@extends('layouts.master')
@section('content')
<form action="{{ URL::route('avisos.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Criar Aviso:</h2>
</div>
</div>

<div class="form-group row">
<label for="aviso" class="col-sm-4 col-form-label text-md-right">Aviso:</label>
<div class="col-md-6">
<input type="text" id="aviso" class="form-control" name="aviso"><br>
</div>
</div>

<div class="form-group row">
<label for="tipo" class="col-sm-4 col-form-label text-md-right">Tipo:</label>
<div class="col-md-6">
<select id="tipo" name="tipo" class="form-control" ><option value="0">Geral</option><option value="1">Restrito</option></select><br>
</div>
</div>

<div class="form-group row">
<label for="text" class="col-sm-4 col-form-label text-md-right">Texto:</label>
<div class="col-md-6">
<textarea id="texto" name="texto" class="form-control" ></textarea><br>
</div>
</div>

<div class="form-group row">
<div class="col-md-4"></div>
<div class="col-md-6">
<input type="submit"  class="btn btn-info">
<input type="hidden" name="_token" 
value="{{ csrf_token() }}">
</div>
</div>

</form>
@stop
@extends('layouts.master')
@section('content')
<form action="{{ URL::route('emprego.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Criar Proposta de Emprego:</h2>
</div>
</div>

<div class="form-group row">
<label for="data" class="col-sm-4 col-form-label text-md-right">Data:</label>
<div class="col-md-6">
<input type="date" id="data" class="form-control" name="data"><br>
</div>
</div>

<div class="form-group row">
<label for="empresa" class="col-sm-4 col-form-label text-md-right">Empresa:</label>
<div class="col-md-6">
<input type="text" id="empresa" class="form-control" name="empresa"><br>
</div>
</div>

<div class="form-group row">
<label for="funcao" class="col-sm-4 col-form-label text-md-right">Função:</label>
<div class="col-md-6">
<input type="text" id="funcao" class="form-control" name="funcao"><br>
</div>
</div>

<div class="form-group row">
<label for="localizacao" class="col-sm-4 col-form-label text-md-right">Localização:</label>
<div class="col-md-6">
<input type="text" id="localizacao" class="form-control" name="localizacao"><br>
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
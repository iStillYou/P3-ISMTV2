@extends('layouts.master')
@section('content')
<form action="{{ URL::route('horarios.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Criar Horários Escolar:</h2>
</div>
</div>

<div class="form-group row">
<label for="data" class="col-sm-4 col-form-label text-md-right">Dia semana:</label>
<div class="col-md-6">
<input type="diasemana" id="diasemana" class="form-control" name="diasemana"><br>
</div>
</div>

<div class="form-group row">
<label for="hora" class="col-sm-4 col-form-label text-md-right">Hora (Ínicio - Fim) :</label>
<div class="col-md-6">
<input type="text" id="hora" class="form-control" name="hora"><br>
</div>
</div>

<div class="form-group row">
<label for="texto" class="col-sm-4 col-form-label text-md-right">Aula:</label>
<div class="col-md-6">
<input type="text" id="texto" class="form-control" name="texto"><br>
</div>
</div>

<div class="form-group row">
<label for="anoLetivo" class="col-sm-4 col-form-label text-md-right">Ano (1º, 2º , 3º):</label>
<div class="col-md-6">
<select  id="anoLetivo" class="form-control" name="anoLetivo">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
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
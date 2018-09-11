@extends('layouts.master')
@section('content')
<form action="{{ URL::route('propinas.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Nova Propina:</h2>
</div>
</div>

<div class="form-group row">
<label for="anoLetivo" class="col-sm-4 col-form-label text-md-right">Ano Letivo:</label>
<div class="col-md-6">
<input type="text" id="anoLetivo" class="form-control" name="anoLetivo"><br>
</div>
</div>

<div class="form-group row">
<label for="Data" class="col-sm-4 col-form-label text-md-right">Data limite:</label>
<div class="col-md-6">
<input type="date" id="dataLimite" class="form-control" name="dataLimite"><br>
</div>
</div>

<div class="form-group row">
<label for="tipoDePagamento" class="col-sm-4 col-form-label text-md-right">Tipo de Pagamento:</label>
<div class="col-md-6">
<input type="text" id="tipoDePagamento" class="form-control" name="tipoDePagamento"><br>
</div>
</div>

<div class="form-group row">
<label for="valor" class="col-sm-4 col-form-label text-md-right">Valor:</label>
<div class="col-md-6">
<input type="text" id="valor" class="form-control" name="valor"><br>
</div>
</div>

<div class="form-group row">
<label for="estado" class="col-sm-4 col-form-label text-md-right">Estado:</label>
<div class="col-md-6">
<select class="form-control" name="estado">
<option value="1">A pagamento</option>
<option value="2">Em atraso</option>
</select><br>
</div>
</div>

<div class="form-group row">
<label for="idUtilizador" class="col-sm-4 col-form-label text-md-right">Pessoa:</label>
<div class="col-md-6">
<select class="form-control" name="idUtilizador">
<?php foreach($utilizadores as $utilizador): ?>
<option value="<?php echo $utilizador->id; ?>">
<?php echo $utilizador->username; ?>
</option>
<?php endforeach ?>
</select>
<br>
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
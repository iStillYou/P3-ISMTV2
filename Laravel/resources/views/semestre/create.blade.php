@extends('layouts.master')
@section('content')
<form action="{{ URL::route('semestre.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Novo Férias (Semestre):</h2>
</div>
</div>



<div class="form-group row">
<label for="tipo" class="col-sm-4 col-form-label text-md-right">Tipo:</label>
<div class="col-md-6">
<input type="text" id="tipo" class="form-control" name="tipo"><br>
</div>
</div>

<div class="form-group row">
<label for="inicio" class="col-sm-4 col-form-label text-md-right">Ínicio:</label>
<div class="col-md-6">
<input type="date" id="inicio" class="form-control" name="inicio"><br>
</div>
</div>

<div class="form-group row">
<label for="fim" class="col-sm-4 col-form-label text-md-right">Fim:</label>
<div class="col-md-6">
<input type="date" id="fim" class="form-control" name="fim"><br>
</div>
</div>

<div class="form-group row">
<label for="texto" class="col-sm-4 col-form-label text-md-right">Descrição:</label>
<div class="col-md-6">
<input type="text" id="texto" class="form-control" name="texto"><br>
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
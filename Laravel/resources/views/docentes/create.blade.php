@extends('layouts.master')
@section('content')
<form action="{{ URL::route('docentes.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Criar Contacto do Docente:</h2>
</div>
</div>

<div class="form-group row">
<label for="nome" class="col-sm-4 col-form-label text-md-right">Nome do docente:</label>
<div class="col-md-6">
<input type="text" id="nome" class="form-control" name="nome"><br>
</div>
</div>

<div class="form-group row">
<label for="professor" class="col-sm-4 col-form-label text-md-right">Categoria profissional:</label>
<div class="col-md-6">
<input type="text" id="professor" class="form-control" name="professor"><br>
</div>
</div>

<div class="form-group row">
<label for="email" class="col-sm-4 col-form-label text-md-right">Email:</label>
<div class="col-md-6">
<input type="email" id="email" class="form-control" name="email"><br>
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
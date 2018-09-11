@extends('layouts.master')
@section('content')
<form action="{{ URL::route('utilizadores.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Criar Utilizador:</h2>
</div>
</div>

<div class="form-group row">
<label for="username" class="col-sm-4 col-form-label text-md-right">Nome do utilizador:</label>
<div class="col-md-6">
<input type="text" id="username" class="form-control" name="username"><br>
</div>
</div>

<div class="form-group row">
<label for="password" class="col-sm-4 col-form-label text-md-right">Senha:</label>
<div class="col-md-6">
<input type="password" id="password" class="form-control" name="password"><br>
</div>
</div>

<div class="form-group row">
<label for="privilegio" class="col-sm-4 col-form-label text-md-right">Privilégio:</label>
<div class="col-md-6">
<select id="privilegio" name="privilegio" class="form-control" ><option value="0">Aluno</option><option value="1">Professor</option></select><br>
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
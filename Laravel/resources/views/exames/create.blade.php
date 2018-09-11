@extends('layouts.master')
@section('content')
<form action="{{ URL::route('exames.store') }}" enctype="multipart/form-data"
method="post">

<div class="form-group row">
<div class="col-sm-4"></div>
<div class="col-md-6">
<h2>Calendário de Exames:</h2>
</div>
</div>



<div class="form-group row">
<label for="anoEscolar" class="col-sm-4 col-form-label text-md-right">Ano escolar (1º,2º,3º):</label>
<div class="col-md-6">
<select  id="anoEscolar" class="form-control" name="anoEscolar">
<option value="1º">1º</option>
<option value="2º">2º</option>
<option value="3º">3º</option>
</select><br>
</div>
</div>

<div class="form-group row">
<label for="unidadeCurricular" class="col-sm-4 col-form-label text-md-right">Unidade curricular:</label>
<div class="col-md-6">
<input type="text" id="unidadeCurricular" class="form-control" name="unidadeCurricular"><br>
</div>
</div>

<div class="form-group row">
<label for="docente" class="col-sm-4 col-form-label text-md-right">Docente:</label>
<div class="col-md-6">
<input type="text" id="docente" class="form-control" name="docente"><br>
</div>
</div>

<div class="form-group row">
<label for="epocanoraml" class="col-sm-4 col-form-label text-md-right">Época normal:</label>
<div class="col-md-6">
<input type="text" id="epocanormal" class="form-control" name="epocanormal"><br>
</div>
</div>

<div class="form-group row">
<label for="dianormal" class="col-sm-4 col-form-label text-md-right">Dia normal:</label>
<div class="col-md-6">
<input type="text" id="dianormal" class="form-control" name="dianormal"><br>
</div>
</div>

<div class="form-group row">
<label for="horanormal" class="col-sm-4 col-form-label text-md-right">Hora normal:</label>
<div class="col-md-6">
<input type="text" id="horanormal" class="form-control" name="horanormal"><br>
</div>
</div>

<div class="form-group row">
<label for="salanormal" class="col-sm-4 col-form-label text-md-right">Sala normal:</label>
<div class="col-md-6">
<input type="text" id="salanormal" class="form-control" name="salanormal"><br>
</div>
</div>

<div class="form-group row">
<label for="epocarecurso" class="col-sm-4 col-form-label text-md-right">Época recurso:</label>
<div class="col-md-6">
<input type="text" id="epocarecurso" class="form-control" name="epocarecurso"><br>
</div>
</div>


<div class="form-group row">
<label for="diarecurso" class="col-sm-4 col-form-label text-md-right">Dia recurso:</label>
<div class="col-md-6">
<input type="text" id="diarecurso" class="form-control" name="diarecurso"><br>
</div>
</div>

<div class="form-group row">
<label for="horarecurso" class="col-sm-4 col-form-label text-md-right">Hora recurso:</label>
<div class="col-md-6">
<input type="text" id="horarecurso" class="form-control" name="horarecurso"><br>
</div>
</div>

<div class="form-group row">
<label for="salarecurso" class="col-sm-4 col-form-label text-md-right">Sala recurso:</label>
<div class="col-md-6">
<input type="text" id="salarecurso" class="form-control" name="salarecurso"><br>
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
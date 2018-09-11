@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem dos Exames</h2>
<br>
<table class="table table-border">
<tr>
<th>Nº Exame</th>

<th>Ano escolar (1º,2º,3º)</th>
<th>Unidade curricular</th>
<th>Docente</th>
<th>Época (Descrição)</th>

<th>Época (Recurso)</th>

<th>Editar/Eliminar</td>
</tr>
<?php foreach($exames as $exame): ?>
<tr>
<td><?php echo $exame->id; ?></td>
<td><?php echo $exame->anoEscolar; ?></td>
<td><?php echo $exame->unidadeCurricular; ?></td>
<td><?php echo $exame->docente; ?></td>
<td><?php echo $exame->epocanormal; ?></td>

<td><?php echo $exame->epocarecurso; ?></td>

<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('exames/' . $exame->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'exames/' . $exame->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-small btn-danger form-control')) }}
{{ Form::close() }}


</td>

</tr>
<?php endforeach ?>
</table>
</div>
</div>
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a class="btn btn-small btn-info" href="{{URL::route('exames.create')}}">Novo Exame</a>
</div>
@stop
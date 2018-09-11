@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem das Calendário Escolar</h2>
<br>
<table class="table table-border">
<tr>
<th>Nº </th>

<th>Tipo</th>
<th>Ínicio</th>
<th>Fim</th>
<th>Descrição</th>
<th>Editar/Eliminar</td>
</tr>
<?php foreach($semestres as $semestre): ?>
<tr>
<td><?php echo $semestre->id; ?></td>
<td><?php echo $semestre->tipo; ?></td>
<td><?php echo $semestre->inicio; ?></td>
<td><?php echo $semestre->fim; ?></td>
<td><?php echo $semestre->texto; ?></td>
<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('semestre/' . $semestre->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'semestre/' . $semestre->id, 'class' => 'pull-right')) }}
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
<a class="btn btn-small btn-info" href="{{URL::route('semestre.create')}}">Novo Calendário</a>
</div>
@stop
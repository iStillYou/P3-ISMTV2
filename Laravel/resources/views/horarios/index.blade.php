@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem de Horários Escolar</h2>
<br>
<table class="table table-border">
<tr>
<th>NºHorário Escolar</th>

<th>Dia da Semana</th>
<th>Hora(Ínicio - Fim)</th>
<th>Aula</th>
<th>Ano(1º,2º,3º)</th>
<th>Editar/Eliminar</th>
</tr>
<?php foreach($horarios as $horario): ?>
<tr>
<td><?php echo $horario->id; ?></td>
<td><?php echo $horario->diasemana; ?></td>
<td><?php echo $horario->hora; ?></td>
<td><?php echo $horario->texto; ?></td>
<td><?php echo $horario->anoLetivo; ?></td>
<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('horarios/' . $horario->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'horarios/' . $horario->id, 'class' => 'pull-right')) }}
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
<a class="btn btn-small btn-info" href="{{URL::route('horarios.create')}}">Novo Horario</a>
</div>
@stop
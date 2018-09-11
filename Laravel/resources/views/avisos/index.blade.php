@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem de Avisos</h2>
<br>
<table class="table table-border">
<tr>
<th>NºAvisos</th>
<th>Aviso</th>
<!-- 0 = Geral | 1 = Com login -->
<th>Tipo</th>
<th>Texto</th>
<th>Editar/Eliminar</td>
</tr>
<?php foreach($avisos as $aviso): ?>
<tr>
<td><?php echo $aviso->id; ?></td>
<td><?php echo $aviso->aviso; ?></td>
<td><?php if($aviso->tipo==1){echo "Restrito";}else if($aviso->tipo==0){echo "Geral";}; ?></td>
<td><?php echo $aviso->texto; ?></td>
<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('avisos/' . $aviso->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'avisos/' . $aviso->id, 'class' => 'pull-right')) }}
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
<a class="btn btn-small btn-info" href="{{URL::route('avisos.create')}}">Registo</a>
</div>
@stop
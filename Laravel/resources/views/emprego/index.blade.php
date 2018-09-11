@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem de Propostas de Emprego</h2>
<br>
<table class="table table-border">
<tr>
<th>NºProposta de Emprego</th>

<th>Data</th>
<th>Empresa</th>
<th>Função</th>
<th>Localização</th>
<th>Editar/Eliminar</td>
</tr>
<?php foreach($empregos as $emprego): ?>
<tr>
<td><?php echo $emprego->id; ?></td>
<td><?php echo $emprego->data; ?></td>
<td><?php echo $emprego->empresa; ?></td>
<td><?php echo $emprego->funcao; ?></td>
<td><?php echo $emprego->localizacao; ?></td>
<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('emprego/' . $emprego->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'emprego/' . $emprego->id, 'class' => 'pull-right')) }}
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
<a class="btn btn-small btn-info" href="{{URL::route('emprego.create')}}">Nova Proposta</a>
</div>
@stop
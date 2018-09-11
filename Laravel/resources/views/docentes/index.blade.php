@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem dos Contactos Docentes</h2>
<br>
<table class="table table-border">
<tr>
<th>Nº Docente</th>

<th>Nome Completo</th>
<th>Categoria Profissional</th>
<th>Email</th>
<th>Editar/Eliminar</td>
</tr>
<?php foreach($docentes as $docente): ?>
<tr>
<td><?php echo $docente->id; ?></td>
<td><?php echo $docente->nome; ?></td>
<td><?php echo $docente->professor; ?></td>
<td><?php echo $docente->email; ?></td>

<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('docentes/' . $docente->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'docentes/' . $docente->id, 'class' => 'pull-right')) }}
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
<a class="btn btn-small btn-info" href="{{URL::route('docentes.create')}}">Novo Contacto</a>
</div>
@stop
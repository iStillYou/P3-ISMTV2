@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem de Utilizadores</h2>
<br>
<table class="table table-border">
<tr>
<th>NºUtilizador</th>
<th>Nome do Utilizador</th>
<!-- 0 = Geral | 1 = Com login -->
<th>Privilégio</th>
<th>Editar/Eliminar</th>
</tr>
<?php foreach($utilizadores as $utilizador): ?>
<tr>
<td><?php echo $utilizador->id; ?></td>
<td><?php echo $utilizador->username; ?></td>
<td><?php if($utilizador->privilegio==1){echo "Professor";}else if($utilizador->privilegio==0){echo "Aluno";}; ?></td>
<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('utilizadores/' . $utilizador->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'utilizadores/' . $utilizador->id, 'class' => 'pull-right')) }}
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
<a class="btn btn-small btn-info" href="{{URL::route('utilizadores.create')}}">Criar novo</a>
</div>
@stop
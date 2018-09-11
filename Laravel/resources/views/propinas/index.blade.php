@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem das Propinas</h2>
<br>
<table class="table table-border">
<tr>
<th>Nº Propina</th>

<th>Ano Letivo</th>
<th>Data de Limite</th>
<th>Tipo de Pagamento</th>
<th>Valor</th>
<th>Estado</th>
<th>Utilizador</th>
<th>Editar/Eliminar</td>
</tr>
<?php foreach($propinas as $propina): ?>
<tr>
<td><?php echo $propina->id; ?></td>
<td><?php echo $propina->anoLetivo; ?></td>
<td><?php echo $propina->dataLimite; ?></td>
<td><?php echo $propina->tipoDePagamento; ?></td>
<td><?php echo $propina->valor; ?></td>
<td><?php 
$estado = $propina->estado;
if($estado == 1)
{
echo "A pagamento";
}else
{
echo "<b>Em atraso</b>";
}
?></td>
<td><?php 

foreach($utilizadores as $utilizador):
    $idUt = $utilizador->id;
    $UtNome = $utilizador->username;
    $idProUt = $propina->idUtilizador;

if( $idUt == $idProUt)
{
echo $UtNome; 
}
endforeach

?></td>

<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('propinas/' . $propina->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'propinas/' . $propina->id, 'class' => 'pull-right')) }}
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
<a class="btn btn-small btn-info" href="{{URL::route('propinas.create')}}">Nova Propina</a>
</div>
@stop
@extends('layouts.master')
@section('content')
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6 ">
<h2>Listagem de Notícias</h2>
<br>
<table class="table table-border">
<tr>
<th>NºNotícia</th>
<th>Titulo</th>
<th>Texto</th>
<th>Data</th>
<th>Imagem</th>
<th>Editar/Eliminar</td>
</tr>
<?php foreach($noticias as $noticia): ?>
<tr>
<td><?php echo $noticia->id; ?></td>
<td><?php echo $noticia->titulo; ?></td>
<td><?php echo $noticia->texto; ?></td>
<td><?php echo $noticia->data; ?></td>
<td><?php echo $noticia->imagem; ?></td>
<td>


<a class="btn btn-small btn-warning form-control" href="{{ URL::to('noticias/' . $noticia->id . '/edit') }}">Editar</a>
<br>
<br>

{{ Form::open(array('url' => 'noticias/' . $noticia->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Eliminar', array('class' => 'btn btn-danger form-control')) }}
{{ Form::close() }}


</td>

</tr>
<?php endforeach ?>
</table>
<br>
</div>
</div>
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-6">
<a class="btn btn-small btn-info" href="{{URL::route('noticias.create')}}">Registo</a>
</div>

@stop
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propinas extends Model
{
    //
    protected $table = 'propinas';
    protected $primaryKey = 'id';
    protected $fillable = array('anoLetivo', 'dataLimite', 'tipoDePagamento', 'valor', 'estado', 'idUtilizador');
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    //
    protected $table = 'semestre';
    protected $primaryKey = 'id';
    protected $fillable = array('unidadeCurricular','docente','tipo', 'inicio', 'fim', 'texto');
    public $timestamps = false;
}

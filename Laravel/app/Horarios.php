<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horarios extends Model
{
    //
    protected $table = 'horarios';
    protected $primaryKey = 'id';
    protected $fillable = array('diasemana', 'hora', 'texto', 'anoLetivo');
    public $timestamps = false;
}

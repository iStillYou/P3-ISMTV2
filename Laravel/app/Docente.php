<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    protected $table = 'docentes';
    protected $primaryKey = 'id';
    protected $fillable = array('nome', 'professor', 'email');
    public $timestamps = false;
}

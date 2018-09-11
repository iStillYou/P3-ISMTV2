<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprego extends Model
{
    //
    protected $table = 'emprego';
    protected $primaryKey = 'id';
    protected $fillable = array('data', 'empresa', 'funcao', 'localizacao');
    public $timestamps = false;
}

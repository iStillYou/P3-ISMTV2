<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avisos extends Model
{
    //
    protected $table = 'avisos';
    protected $primaryKey = 'id';
    protected $fillable = array('aviso', 'tipo', 'texto');
    public $timestamps = true;

    
}

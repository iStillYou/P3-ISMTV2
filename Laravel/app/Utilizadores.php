<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utilizadores extends Model
{
    //
    protected $table = 'utilizadores';
    protected $primaryKey = 'id';
    protected $fillable = array('username','password','privilegio');
    public $timestamps = true;
}

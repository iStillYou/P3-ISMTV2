<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exames extends Model
{
    //
    protected $table = 'exames';
    protected $primaryKey = 'id';
    protected $fillable = array('anoEscolar', 'unidadeCurricular', 'docente', 'epocanormal', 'dianormal', 'horanormal',
    'salanormal', 'epocarecurso', 'diarecurso', 'horarecurso', 'salarecurso');
    public $timestamps = false;
}

<?php

namespace App\Http\Controllers;

use App\Exames;

use Illuminate\Http\Request;

class ExamesControllerApi extends Controller
{
    //
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $exames = Exames::all();
            
            foreach($exames as $exame)
            {
                $response->push([
                    'id' => $exame->id,
                    'anoEscolar' => $exame->anoEscolar,
                    'unidadeCurricular' => $exame->unidadeCurricular,
                    'docente' => $exame->docente,
                    'epocanormal' => $exame->epocanormal,
                    'dianormal' => $exame->dianormal,
                    'horanormal' => $exame->horanormal,
                    'salanormal' => $exame->salanormal,
                    'epocarecurso' => $exame->epocarecurso,
                    'diarecurso' => $exame->diarecurso,
                    'horarecurso' => $exame->horarecurso,
                    'salarecurso' => $exame->salarecurso
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}

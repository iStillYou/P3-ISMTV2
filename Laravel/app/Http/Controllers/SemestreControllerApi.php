<?php

namespace App\Http\Controllers;

use App\Semestre;

use Illuminate\Http\Request;

class SemestreControllerApi extends Controller
{
    //
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $semestres = Semestre::all();
           
            
            foreach($semestres as $semestre)
            {
                
                $response->push([
                    'id' => $semestre->id,
                    'tipo' => $semestre->tipo,
                    'inicio' => $semestre->inicio,
                    'fim' => $semestre->fim,
                    'texto' => $semestre->texto,
                    
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}

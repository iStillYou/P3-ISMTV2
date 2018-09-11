<?php

namespace App\Http\Controllers;

use App\Horarios;

use Illuminate\Http\Request;

class HorariosControllerApi extends Controller
{
    //
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $horarios = Horarios::all();
            
            foreach($horarios as $horario)
            {
                $response->push([
                    'id' => $horario->id,
                    'diasemana' => $horario->diasemana,
                    'hora' => $horario->hora,
                    'texto' => $horario->texto,
                    'anoLetivo' => $horario->anoLetivo
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}

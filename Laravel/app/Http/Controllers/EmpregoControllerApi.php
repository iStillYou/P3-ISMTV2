<?php

namespace App\Http\Controllers;

use App\Emprego;

use Illuminate\Http\Request;

class EmpregoControllerApi extends Controller
{
    //
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $empregos = Emprego::all();
            
            foreach($empregos as $emprego)
            {
                $response->push([
                    'id' => $emprego->id,
                    'data' => $emprego->data,
                    'empresa' => $emprego->empresa,
                    'funcao' => $emprego->funcao,
                    'localizacao' => $emprego->localizacao
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Docente;

class DocenteControllerApi extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $docentes = Docente::all();
            
            foreach($docentes as $docente)
            {
                $response->push([
                    'id' => $docente->id,
                    'nome' => $docente->nome,
                    'professor' => $docente->professor,
                    'email' => $docente->email
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
    
}
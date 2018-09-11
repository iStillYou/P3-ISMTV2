<?php
namespace App\Http\Controllers;
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Avisos;

class AvisosControllerApi extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $avisos = Avisos::all();
            
            foreach($avisos as $aviso)
            {
                $response->push([
                    'id' => $aviso->id,
                    'aviso' => $aviso->aviso,
                    'tipo' => $aviso->tipo,
                    'texto' => $texto->texto
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
    public function show($id) {
        try {
            $statusCode = 200;
            $response = collect([]);
            $aviso = Aviso::findOrFail($id);
            $response->push([
                'id' => $aviso->id,
                'aviso' => $aviso->aviso,
                'tipo' => $aviso->tipo
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Aviso not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
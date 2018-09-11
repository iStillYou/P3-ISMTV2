<?php
namespace App\Http\Controllers;
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Noticias;

class NoticiasControllerApi extends Controller
{
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $noticias = Noticias::all();
            
            foreach($noticias as $noticia)
            {
                $response->push([
                    'id' => $noticia->id,
                    'titulo' => $noticia->titulo,
                    'texto' => $noticia->texto,
                    'data' => $noticia->data,
                    'imagem' => $noticia->imagem
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
            $aviso = Noticias::findOrFail($id);
            $response->push([
                'id' => $noticia->id,
                    'titulo' => $noticia->titulo,
                    'texto' => $noticia->texto,
                    'data' => $noticia->data,
                    'imagem' => $noticia->imagem
            ]);
        } catch (Exception $e) {
            $response->push(['error' => 'Aviso not found.']);
            $statusCode = 404; //Not Found
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
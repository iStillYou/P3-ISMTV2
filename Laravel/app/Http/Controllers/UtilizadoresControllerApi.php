<?php
namespace App\Http\Controllers;
use Illuminate\Support\collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Utilizadores;

class UtilizadoresControllerApi extends Controller
{
    public function index() {
       try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $utilizadores = Utilizadores::all();
            
            foreach($utilizadores as $utilizador)
            {
                $response->push([
                    'id' => $utilizador->id,
                    'username' => $utilizador->username,
                    'password' => $utilizador->password,
                    'privilegio' => $utilizador->privilegio
                    
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}
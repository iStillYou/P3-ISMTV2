<?php

namespace App\Http\Controllers;

use App\Propinas;
use App\Utilizadores;

use Illuminate\Http\Request;

class PropinasControllerApi extends Controller
{
    //
    public function index() {
        try {
            $statusCode = 200; //Ok
            $response = collect([]);
            $propinas = Propinas::all();
            $utilizadores = Utilizadores::all();
            
            foreach($propinas as $propina)
            {
                if($propina->estado == 1){$estado =  "A pagamento"; }else{ $estado = "Em atraso";};
                foreach($utilizadores as $utilizador)
                {
                    $idUt = $utilizador->id;
                    $UtNome = $utilizador->username;
                    $idProUt = $propina->idUtilizador;

                    if( $idUt == $idProUt)
                    {
                    echo $UtNome; 
                    }
                }

                $response->push([
                    'id' => $propina->id,
                    'anoLetivo' => $propina->anoLetivo,
                    'dataLimite' => $propina->dataLimite,
                    'tipoDePagamento' => $propina->tipoDePagamento,
                    'valor' => $propina->valor,
                    'estado' => $estado,
                    'idUtilizador' => $UtNome
                ]);
            }
        } catch (Exception $e) {
            $statusCode = 400; //bad request
        } finally {
            return response()->json($response, $statusCode)->header('Access-Control-Allow-Origin', '*')->header('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
        }
    }
}

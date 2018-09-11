<?php

namespace App\Http\Controllers;


use App\Propinas;
use App\Utilizadores;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;


class PropinasController extends Controller
{
    //
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //
    public function index() {
        $propinas = Propinas::orderBy('id')->get();
        $utilizadores = Utilizadores::orderBy('id')->get();
        return view('propinas.index', compact('propinas', 'utilizadores'));
        }

    public function create() {
        $utilizadores = Utilizadores::orderBy('id')->get();
        return view('propinas.create', compact('utilizadores'));
        }

    public function store(Request $request) {


        $propina = Propinas::create(Input::all());

        return Redirect::route('propinas.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $propina = Propinas::find($id);
            $propina->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('propinas');
        }

        public function edit($id)
        {
            //
            $propina = Propinas::find($id);
            $utilizadores = Utilizadores::pluck('username', 'id');

        // show the edit form and pass the nerd
        return View::make('propinas.edit')
            ->with(compact('propina', 'utilizadores'));
        }

        public function update($id)
        {

            $propina = Propinas::find($id);
            $propina->anoLetivo = Input::get('anoLetivo');
            $propina->dataLimite = Input::get('dataLimite');
            $propina->valor = Input::get('valor');
            $propina->estado = Input::get('estado');
            $propina->idUtilizador = Input::get('idUtilizador');
            $propina->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('propinas');
        
        }

        public function __construct()
        {
        $this->middleware('auth');
        }
}

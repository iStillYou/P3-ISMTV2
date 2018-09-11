<?php

namespace App\Http\Controllers;

use App\Horarios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class HorariosController extends Controller
{
    //
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function index() {
        $horarios = Horarios::orderBy('id')->get();
        return view('horarios.index', compact('horarios'));
        }

    public function create() {
        return view('horarios.create');
        }

    public function store() {
        $horario = Horarios::create(Input::all());
        return Redirect::route('horarios.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $horario = Horarios::find($id);
            $horario->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('horarios');
        }

        public function edit($id)
        {
            //
            $horario = Horarios::find($id);

            // show the edit form and pass the nerd
            return View::make('horarios.edit')
                ->with('horario', $horario);
        }

        public function update($id)
        {

            $horario = Horarios::find($id);
            $horario->diasemana = Input::get('diasemana');
            $horario->hora = Input::get('hora');
            $horario->texto = Input::get('texto');
            $horario->anoLetivo = Input::get('anoLetivo');
            $horario->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('horarios');
        
        }


        public function __construct()
        {
        $this->middleware('auth');
        }
}

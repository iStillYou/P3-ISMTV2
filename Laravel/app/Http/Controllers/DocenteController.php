<?php

namespace App\Http\Controllers;

use App\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class DocenteController extends Controller
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
        $docentes = Docente::orderBy('id')->get();
        return view('docentes.index', compact('docentes'));
        }

    public function create() {
        return view('docentes.create');
        }

    public function store() {
        $docente = Docente::create(Input::all());
        return Redirect::route('docentes.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $docente = Docente::find($id);
            $docente->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('docentes');
        }

        public function edit($id)
        {
            //
            $docente = Docente::find($id);

            // show the edit form and pass the nerd
            return View::make('docentes.edit')
                ->with('docente', $docente);
        }

        public function update($id)
        {

            $docente = Docente::find($id);
            $docente->nome = Input::get('nome');
            $docente->professor = Input::get('professor');
            $docente->email = Input::get('email');
            $docente->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('docentes');
        
        }


        public function __construct()
        {
        $this->middleware('auth');
        }   
}

<?php

namespace App\Http\Controllers;

use App\Avisos;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class AvisosController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //
    public function index() {
        $avisos = Avisos::orderBy('id')->get();
        return view('avisos.index', compact('avisos'));
        }

    public function create() {
        return view('avisos.create');
        }

    public function store() {
        $aviso = Avisos::create(Input::all());
        return Redirect::route('avisos.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $aviso = Avisos::find($id);
            $aviso->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('avisos');
        }

        public function edit($id)
        {
            //
            $aviso = Avisos::find($id);

            // show the edit form and pass the nerd
            return View::make('avisos.edit')
                ->with('aviso', $aviso);
        }

        public function update($id)
        {

            $aviso = Avisos::find($id);
            $aviso->aviso       = Input::get('aviso');
            $aviso->tipo      = Input::get('tipo');
            $aviso->texto = Input::get('texto');
            $aviso->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('avisos');
        
        }


        public function __construct()
        {
        $this->middleware('auth');
        }   
}

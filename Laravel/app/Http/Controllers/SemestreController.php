<?php

namespace App\Http\Controllers;


use App\Semestre;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Query\Builder;

class SemestreController extends Controller
{
    //
    //
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //
    public function index() {
        $semestres = Semestre::orderBy('id')->get();
        
        return view('semestre.index', compact('semestres'));
        }

    public function create() {

        return view('semestre.create');
        }

    public function store(Request $request) {


        $semestre = Semestre::create(Input::all());

        return Redirect::route('semestre.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $semestre = Semestre::find($id);
            $semestre->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('semestre');
        }

        public function edit($id)
        {
            //
            $semestre = Semestre::find($id);

        // show the edit form and pass the nerd
        return View::make('semestre.edit')
            ->with(compact('semestre'));
        }

        public function update($id)
        {

            $semestre = Semestre::find($id);
            $semestre->tipo = Input::get('tipo');
            $semestre->inicio = Input::get('inicio');
            $semestre->fim = Input::get('fim');
            $semestre->texto = Input::get('texto');
            $semestre->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('semestre');
        
        }

        public function __construct()
        {
        $this->middleware('auth');
        }
}

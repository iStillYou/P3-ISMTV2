<?php

namespace App\Http\Controllers;

use App\Exames;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;

class ExamesController extends Controller
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
        $exames = Exames::orderBy('id')->get();
        return view('exames.index', compact('exames'));
        }

    public function create() {
        return view('exames.create');
        }

    public function store() {
        $exames = Exames::create(Input::all());
        return Redirect::route('exames.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $exame = Exames::find($id);
            $exame->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('exames');
        }

        public function edit($id)
        {
            //
            $exame = Exames::find($id);

            // show the edit form and pass the nerd
            return View::make('exames.edit')
                ->with('exame', $exame);
        }

        public function update($id)
        {

            $exame = Exames::find($id);
            $exame->semestre = Input::get('semestre');
            $exame->anoEscolar = Input::get('anoEscolar');
            $exame->unidadeCurricular = Input::get('unidadeCurricular');
            $exame->docente = Input::get('docente');
            $exame->epocanormal = Input::get('epocanormal');
            $exame->dianormal = Input::get('dianormal');
            $exame->horanormal = Input::get('horanormal');
            $exame->salanormal = Input::get('salanormal');
            $exame->epocarecurso = Input::get('epocarecurso');
            $exame->diarecurso = Input::get('diarecurso');
            $exame->horarecurso = Input::get('horarecurso');
            $exame->salarecurso = Input::get('salarecurso');
            $exame->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('exames');
        
        }


        public function __construct()
        {
        $this->middleware('auth');
        }
}

<?php

namespace App\Http\Controllers;

use App\Emprego;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Session;


class EmpregoController extends Controller
{
    //
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    public function index() {
        $empregos = Emprego::orderBy('id')->get();
        return view('emprego.index', compact('empregos'));
        }

    public function create() {
        return view('emprego.create');
        }

    public function store() {
        $emprego = Emprego::create(Input::all());
        return Redirect::route('emprego.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $emprego = Emprego::find($id);
            $emprego->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('avisos');
        }

        public function edit($id)
        {
            //
            $emprego = Emprego::find($id);

            // show the edit form and pass the nerd
            return View::make('emprego.edit')
                ->with('emprego', $emprego);
        }

        public function update($id)
        {

            $emprego = Emprego::find($id);
            $emprego->data = Input::get('data');
            $emprego->empresa = Input::get('empresa');
            $emprego->funcao = Input::get('funcao');
            $emprego->localizacao = Input::get('localizacao');
            $emprego->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('emprego');
        
        }


        public function __construct()
        {
        $this->middleware('auth');
        }

}

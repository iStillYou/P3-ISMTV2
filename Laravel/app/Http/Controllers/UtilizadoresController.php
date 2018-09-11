<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Collection;

use App\Utilizadores;

class UtilizadoresController  extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //
    public function index() {
        $utilizadores = Utilizadores::orderBy('id')->get();
        return view('utilizadores.index', compact('utilizadores'));
        }

    public function create() {
        return view('utilizadores.create');
        }

    public function store() {
        
        $Utilizadores = new Utilizadores();
        $Utilizadores->username = Input::get('username');
        $Utilizadores->password = Input::get('password');
        $Utilizadores->privilegio = Input::get('privilegio');
        $Utilizadores->save();

        return Redirect::route('utilizadores.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $utilizadores = Utilizadores::find($id);
            $utilizadores->delete();

            // redirect com message
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('utilizadores');
        }

        public function edit($id)
        {
            //
            $utilizadores = Utilizadores::find($id);

            // show the edit form and pass the nerd
            return View::make('utilizadores.edit')
                ->with('utilizadores', $utilizadores);
        }

        public function update($id)
        {

            $Utilizadores = Utilizadores::find($id);
            $Utilizadores->username = Input::get('username');
            $Utilizadores->password = Input::get('password');
            $Utilizadores->privilegio = Input::get('privilegio');
            $Utilizadores->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('utilizadores');
        
        }


        public function __construct()
        {
        $this->middleware('auth');
        }   
}
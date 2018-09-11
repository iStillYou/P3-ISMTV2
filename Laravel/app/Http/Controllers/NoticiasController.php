<?php

namespace App\Http\Controllers;

use App\Noticias;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Collection;

class NoticiasController extends Controller
{
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //
    public function index() {
        $noticias = Noticias::orderBy('id')->get();
        return view('noticias.index', compact('noticias'));
        }

    public function create() {
        return view('noticias.create');
        }

    public function store(Request $request) {

        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $this->save();
        }

        $noticia = Noticias::create(Input::all());
        
        if ($request->hasFile('imagem')) {
        $id = Noticias::orderBy('id')->get()->last();
        $noticia = Noticias::find($id);
        $noticia->imagem = $destinationPath;
        $noticia->save();
        }

        return Redirect::route('noticias.index');
        }

        public function destroy($id)
        {
            //
            // delete
            $noticia = Noticias::find($id);
            $noticia->delete();

            // redirect
            Session::flash('message', 'Foi eliminado com successo!');
            return Redirect::to('noticias');
        }

        public function edit($id)
        {
            //
            $noticia = Noticias::find($id);

        // show the edit form and pass the nerd
        return View::make('noticias.edit')
            ->with('noticia', $noticia);
        }

        public function update($id)
        {

            $noticia = Noticias::find($id);
            $noticia->titulo = Input::get('titulo');
            $noticia->texto = Input::get('texto');
            $noticia->data = Input::get('data');
            $noticia->imagem = Input::get('imagem');
            $noticia->save();

            // redirect
            Session::flash('message', 'Foi atualizado com sucesso!');
            return Redirect::to('noticias');
        
        }

        public function __construct()
        {
        $this->middleware('auth');
        }
           
}

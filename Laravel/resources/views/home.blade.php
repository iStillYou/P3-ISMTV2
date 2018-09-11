@extends('layouts.master')
@section('content')

 <div class="content">
                <div class="title m-b-md">
                    Bem-vindo ao ISMT App
                </div>

                <div class="links">
               
                @if (Route::has('login'))
             
                    @auth
                    
                        <a href="{{ route('home') }}">Ínicio</a>
                        <a href="{{ URL::to('utilizadores') }}">Utilizadores</a>
                        <a href="{{ URL::to('emprego') }}">Pro. de Emprego</a>
                        <a href="{{ URL::to('horarios') }}">Horários Escolares</a>
                        <a href="{{ URL::to('docentes') }}">Docentes</a>
                        <a href="{{ URL::to('propinas') }}">Propinas</a>
                        <a href="{{ URL::to('semestre') }}">Cal. Escolar</a>
                        <a href="{{ URL::to('exames') }}">Exames</a>
                        <a href="{{ URL::to('avisos') }}">Avisos</a>
                        <a href="{{ URL::to('noticias') }}">Notícias</a>
                    
                    @else
                        <a href="{{ route('login') }}">Login</a>
                       
                    @endauth
               
            @endif
                </div>
            </div>

@stop
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      session()->flash('mensagem', 'Login Efetuado com Sucesso!');
      $produtos = Produto::orderBy('nome')->get();
      return view('index',['produtos'=> $produtos]);
    }
}

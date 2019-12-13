<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Auth;

class PaginasController extends Controller
{

  public function index(){
    $produtos = Produto::orderBy('nome')->get();
    return view('index',['produtos'=> $produtos]);
  }


}

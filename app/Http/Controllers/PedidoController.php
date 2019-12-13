<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carrinho;
use App\Pedido;
use Auth;

class PedidoController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
  public function index()
  {
      $pedidos = Pedido::orderBy('created_at','desc')->where('user_id', Auth::user()->id)->get();
      return view ('pedidos.index',['pedidos' => $pedidos]);

  }



  public function store(Request $request)
  {
    $carrinhos = Carrinho::orderBy('created_at','desc')->get();
    foreach ($carrinhos as $c) {
        if ($c->user_id == Auth::user()->id){
            $c->delete();
        }
    }
    $r = new Pedido;
    $r-> user_id = Auth::user()->id;
    $r-> valortotal = $request->valor;
    $r->save();

    return redirect()->route('pedidos.index');

  }




}

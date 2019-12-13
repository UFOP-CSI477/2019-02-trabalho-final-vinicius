<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;
use App\Carrinho;
use Auth;

class CarrinhoController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
    }
  public function index()
  {
      $valortotal = 0.0;
      $carrinhos = Carrinho::orderBy('created_at','desc')->where('user_id', Auth::user()->id)->get();
      $produtos = Produto::orderBy('nome')->get();

      foreach ($carrinhos as $c) {
          foreach($produtos as $p){
              if($p->id == $c->produto_id){
                  $valortotal += $p->preco*$c->qtde;
              }
          }
      }

      $produtos = Produto::orderBy('id')->get();
      return view ('carrinhos.index',['carrinhos' => $carrinhos,'produtos'=>$produtos,'valortotal'=>$valortotal]);

  }

  public function create()
  {

  }

  public function store(Request $request)
  {
    $r = new Carrinho;
    $r-> user_id = Auth::user()->id;
    $r-> produto_id = $request->id;
    $r-> qtde = 1;
    $r->save();

    return redirect()->route('index');

  }

  public function show()
  {

  }

  public function destroy(Carrinho $carrinho)
  {
    $carrinho->delete();
    return redirect()->route('carrinhos.index');
  }

  public function edit()
  {

  }

  public function update_add(Request $request, Carrinho $carrinho)
  {
      $identificador = $request->id;
      $carrinhos = Carrinho::orderBy('created_at','desc')->get();
      $carrinho->fill($request->all());

      foreach ($carrinhos as $carrinho) {
        if($identificador == $carrinho->id){
          $carrinho->qtde += 1;
          $carrinho->save();
        }
      }

      return redirect()->route('carrinhos.index');
  }
  public function update_sub(Request $request, Carrinho $carrinho)
  {
    $identificador = $request->id;
    $carrinhos = Carrinho::orderBy('created_at','desc')->get();
    $carrinho->fill($request->all());

    foreach ($carrinhos as $carrinho) {
      if($identificador == $carrinho->id){
        $carrinho->qtde -= 1;
        $carrinho->save();
      }
    }

    return redirect()->route('carrinhos.index');

  }
}

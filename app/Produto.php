<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  protected $fillable = ['nome','descricao','imagem','preco'];

  public function carrinhos() {
    return $this->hasMany('App\Carrinho');
  }
}

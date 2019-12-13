<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
  protected $fillable = ['qtde'];

  public function produtos() {
    return $this->belongsTo('App\Produtos');
  }

}

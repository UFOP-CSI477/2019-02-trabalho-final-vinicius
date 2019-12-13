<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Carrinho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('carrinhos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->unsignedbigInteger('user_id');
          $table->unsignedbigInteger('produto_id');
          $table->unsignedbigInteger('qtde');
          $table->timestamps();
          $table->foreign('user_id')->references('id')->on('users');
          $table->foreign('produto_id')->references('id')->on('produtos');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinhos');
    }
}

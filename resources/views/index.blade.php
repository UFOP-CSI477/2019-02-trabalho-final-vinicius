@extends('menu')

@section('conteudo')



  <!-- Page Content -->
  <div class="container">
    <br>
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
          <strong>{{ Session::get('mensagem') }}</strong>
        </div>
    @endif

    <!-- Heading Row -->
    <div class="row align-items-center my-5">
      <div class="col-lg-7">
        <img class="img-fluid rounded mb-4 mb-lg-0" src="/img/principal.png" alt="">
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <h1 class="font-weight-light">Seja bem-vindo ao Supermercado WEB</h1>
        <p>Aproveite o site para realizar suas compras online. Coloque os produtos no carrinho, realize o pedido e ele será entregue na sua casa!</p>
        <a class="btn btn-success" href="#produtos">Vá as Compras</a>
      </div>
      <!-- /.col-md-4 -->
    </div>
    <!-- /.row -->
    <span id='produtos'></span>
    <!-- Call to Action Well -->
    <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <h1 class="font-weight-light">VEJA AS OFERTAS ABAIXO</h1>
      </div>
    </div>

    <div class="row">
    <!-- Content Row -->

    @foreach ($produtos as $p)

      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <h2 class="card-title">{{ $p->nome }}</h2>
            <img class="img-responsive" src="\img\{{ $p->imagem }}" width="100%">
            <p class="card-text">{{ $p->descricao }}</p>
          </div>
          <div class="card-footer">
            <div class="row">
            <form method="post" action="{{route('carrinhos.store')}}">
                @csrf
                <input type="hidden" name="id"  value="{{$p->id}}" />
                <input class="btn btn-success btn-sm" type="submit" name="btnSalvar" value="Comprar"></input>
            </form>
            <h2 class="preco">R${{$p->preco}}</h2>
          </div>

          </div>
        </div>
      </div>

    @endforeach
    </div>
    <!-- /.row -->

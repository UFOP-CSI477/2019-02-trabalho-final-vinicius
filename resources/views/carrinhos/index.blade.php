@extends('menu')
@section('conteudo')
<br>
<h3>Produtos no Carrinho</h3>
<table class="table table-striped table-bordered">
    <thead class="table-light">
      <center>
      <tr>
        <th>Imagem</th>
        <th>Nome Produto</th>
        <th>Qtde</th>
        <th>Valor</th>
        <th>Total</th>
        <th>Adicionado às</th>
        <th>Excluir</th>
      </tr>
    </center>
    </thead>
    <tbody>
  @foreach ($carrinhos as $c)
      <tr>

        <td width="150"><!--  Imagem   -->
            @foreach ($produtos as $p)
              @if ( $p->id == $c->produto_id) <img class="img-responsive" src="\img\{{ $p->imagem }}" width="80%"> @endif
            @endforeach
        </td>

        <td><!--  Nome Produto   -->
            @foreach ($produtos as $p)
              @if ( $p->id == $c->produto_id) {{ $p->nome }} @endif
            @endforeach
        </td>

        <td width="150">
          <div class="row">
            <form method="post" action="{{route('carrinhossub',$c)}}">
                @csrf
                @method('PATCH')
                <input id="sub_button" class="btn btn-primary" type="submit" value="-">
            </form>
          <label>  </label>
          <h3>{{ $c->qtde }}</h3>
            <form method="post" action="{{route('carrinhosadd',$c)}}">
                @csrf
                @method('PATCH')

                <input id="add_button" class="btn btn-primary" type="submit" value="+">
            </form>
          <div>
        </td>

        <td><!--  Valor   -->
            @foreach ($produtos as $p)
              @if ( $p->id == $c->produto_id) R$ {{ $p->preco }} @endif
            @endforeach
        </td>

        <td><!--  Total   -->
            @foreach ($produtos as $p)
              @if ( $p->id == $c->produto_id) R$ {{ $p->preco*$c->qtde }} @endif
            @endforeach
        </td>

        <td>{{ $c->created_at }}</td>

        <td>
          <form method="post" action="{{route('carrinhos.destroy',$c->id)}}"
              onsubmit="return confirm('Retirar do Carrinho?');">
              @csrf
              @method('DELETE')
              <input class="btn btn-danger" type="submit" value="Excluir">
          </form>
        </td>
      </tr>
  @endforeach
    </tbody>
  </table>
  <center>
    <h3>Total no Carrinho: R$ {{$valortotal}}</h3>
  <form method="post" action="{{route('pedidos.store')}}">
      @csrf

      <input type="hidden" name="valor"  value="{{$valortotal}}" />
      <input class="btn btn-success" type="submit" name="btnSalvar" value="Concluir Pedido"></input>
  </form>
</center>
<br>
@endsection

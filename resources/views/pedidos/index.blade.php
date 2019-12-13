@extends('menu')
@section('conteudo')
<div class="container">
<br>
<h3>Usuário: {{ Auth::user()->name }}</h3>
<p>E-mail: {{ Auth::user()->email}}</p>
<p>Endereco: {{ Auth::user()->endereco}}</p>

<h3>Pedidos Realizados</h3>

<table class="table table-striped table-bordered">
    <thead class="table-light">
      <tr>
        <th>Id</th>
        <th>Nº Produtos</th>
        <th>Valor Total</th>
        <th>Data</th>
      </tr>
    </thead>
    <tbody>
  @foreach ($pedidos as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->produtos}}</td>
        <td>{{ $p->valortotal }}</td>
        <td>{{ $p->created_at }}</td>
      </tr>
  @endforeach
    </tbody>
  </table>
@endsection
</div>

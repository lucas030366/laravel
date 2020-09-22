@extends('layouts.front.app')

@section('content')
<div class="container">
  <h1 class="font-weight-bolder text-center">Listagem de produtos</h1>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Preço</th>
        <th>Visualizar</th>
      </tr>
    </thead>
    
    <tbody>
      @forelse ($products as $product)
      <tr>     
        <td>{{$product->name}}</td>
        <td>{{$product->price, 2}}</td>
        <td style="width: 20%">
          <a href="{{route('produtos.show', $product->id )}}" class="btn btn-success btn-sm">
            Detalhes
          </a>
          <a href="{{route('produtos.edit', $product->id )}}" class="btn btn-info btn-sm">
            Editar
          </a>
        </td> 
      </tr> 
      @empty
      <h3>Nenhum produto Cadastrado</h3> 
      @endforelse    
    </tbody>
    
  </table>
  
  <div class="d-flex justify-content-center mt-3">
    {{$products->links()}}
  </div>
  
  <hr>
  
  @auth
  <p>autenticado</p>    
  @else
  <p>não autenticado</p>
  @endauth
  
  <a href="{{ route('produtos.create') }}">Cadastrar</a>
  
  <hr>
</div>
@endsection
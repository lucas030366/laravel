@extends('layouts.front.app')

@section('content')
<div class="container">
  <h1 class="font-weight-bolder text-center">Listagem de produtos</h1>
  
  <form action="{{route('produtos.search')}}" method="post" class="form-inline">
    @csrf
    <input type="text" class="form-control" name="search" placeholder="buscar produto" value="{{ $filters['search'] ?? '' }}">
    <button type="submit" class="btn btn-md btn-primary">OK</button>
  </form>
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Imagem</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Visualizar</th>
      </tr>
    </thead>
    
    <tbody>
      @forelse ($products as $product)
      <tr> 
        <td style="width: 10%">
          @isset($product->image)
          @php
          $src = asset("storage/$product->image")
          @endphp
          <img src="{{$src}}" alt="{{$product->name}}" class="img-fluid">
          @else
          
          @endisset
        </td>    
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
    @isset($filters)  
    {{$products->appends($filters)->links()}} 
    @else 
    {{$products->links()}}  
    @endisset
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
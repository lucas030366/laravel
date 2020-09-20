@extends('layouts.front.app')

@section('content')
<div class="container">
  
  @isset($product)
  
  <h3>Nome: {{$product->name}}</h3>
  <h4>Descrição: {{$product->description}}</h4>
  
  @else
  
  <div class="alert alert-warning font-weight-bold">
    Produto não encontrado  
  </div>  
  
  @endisset
  
  <a href="{{route('produtos.index')}}" class="font-weight-bold text-primary">Ver Produtos</a>

  <div class="red-500 py-3"></div>
  
</div>
@endsection

@extends('layouts.front.app')

@section('content')

<h1>Listagem de produtos</h1>

<div>
  @foreach($products as $product)
  <h3> >{{ $product }} </h3>
  @endforeach
</div>

<hr>

@forelse ($list as $item)
<h3>>{{ $item }}</h3>
@empty
<h3>Listagem vazia</h3>
@endforelse

<hr>

@isset($teste)
<p>{{ $teste }}</p>
@endisset

<hr>

@empty($teste3)
<p>vazio</p>   
@else 
<p>não vazio</p>
@endempty

<hr>

@auth
<p>autenticado</p>    
@else
<p>não autenticado</p>
@endauth

<a href="{{ route('produtos.create') }}">Cadastrar</a>

<hr>

@endsection
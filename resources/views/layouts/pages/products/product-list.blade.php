@extends('layouts.front.app')

@section('content')

<h4>Listagem de produtos</h4>

<div>
  @foreach($products as $product)
    <h3> >{{ $product }} </h3>
  @endforeach
</div>
    
@endsection
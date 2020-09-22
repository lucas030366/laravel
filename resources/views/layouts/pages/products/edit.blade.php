@extends('layouts.front.app')

@section('content')
<div class="container">

  @include("layouts.pages.errors.error")

  <h1 class="font-weight-bolder text-center">Cadastrar produtos</h1>
    
  <form action="{{ route('produtos.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @method("put")
    @include("layouts.pages.shared.form-product", ["product" => $product])
  </form>
</div>
@endsection
@extends('layouts.front.app')

@section('content')
<div class="container">
  
  @isset($product)
  
  <form action="{{route('produtos.destroy', $product->id)}}" method="post" class="form-delete">
    @csrf
    
    @method("delete")
    
    <h3>Nome: {{$product->name}}</h3>
    <h4>Descrição: {{$product->description}}</h4>
    
    <button type="button" class="btn btn-sm font-weight-bold btn-danger btn-delete">
      Deletar produto
    </button>
  </form>
  
  @else
  
  <div class="alert alert-warning font-weight-bold">
    Produto não encontrado  
  </div>  
  
  @endisset
  
  <a href="{{route('produtos.index')}}" class="font-weight-bold text-primary">Ver Produtos</a>
  
  <div class="red-500 py-3"></div>
  
</div>
@endsection


@push('script')
<script>
  const btn_delete = document.querySelector(".btn-delete")
  const form_delete = document.querySelector(".form-delete")
  btn_delete.addEventListener("click", function(){
    const confirmar = confirm("Deseja excluir esse item?")
    if(confirmar) form_delete.submit()
  })  
</script>
@endpush
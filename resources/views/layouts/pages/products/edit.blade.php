@extends('layouts.front.app')

@section('content')
<h1>Editar produto</h1>   

<form action="{{ route('produtos.update', 1) }}" method="post">
  @csrf
  @method("put")
  <div>
    <label for="nome">Nome:</label>
    <input type="text" name="name">
  </div>
  
  <div>
    <label for="descricao">Descrição:</label>
    <textarea name="description" id="descricao" cols="30" rows="1"></textarea>
  </div>
  <button type="submit">Enviar</button>
</form>
@endsection

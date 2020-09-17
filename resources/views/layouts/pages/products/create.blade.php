@extends('layouts.front.app')

@section('content')
<h1>Cadastrar novo produto</h1>   

<form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
 @csrf
  <div>
    <label for="nome">Nome:</label>
    <input type="text" name="name">
  </div>
  
  <div>
    <label for="descricao">Descrição:</label>
    <textarea name="description" id="descricao" cols="30" rows="1"></textarea>
  </div>

  <div>
    <input type="file" name="photo">
  </div>
  <button type="submit">Enviar</button>
</form>
@endsection
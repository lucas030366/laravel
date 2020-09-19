@extends('layouts.front.app')

@section('content')
<h1>Cadastrar novo produto</h1>

@if($errors->any())
<ul>
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif

<form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  
  <label for="nome">Nome:</label>
  <input type="text" name="name" value="{{ old('name') }}">
  
  <label for="descricao">Descrição:</label>
  <textarea name="description" id="descricao" cols="30" rows="1" value="{{ old('description') }}"></textarea>  
  
  <input type="file" name="photo">
  
  <button type="submit">Enviar</button>
</form>
@endsection
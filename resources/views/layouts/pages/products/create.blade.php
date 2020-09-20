@extends('layouts.front.app')

@section('content')
<div class="container">
  <h1 class="font-weight-bolder text-center">Cadastrar produtos</h1>
  
  @if($errors->any())
  <ul class="lsit-unstyled">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
  @endif
  
  <form action="{{ route('produtos.store') }}" method="post" enctype="multipart/form-data">
    
    @csrf
    
    <div class="row">
      <div class="col-lg">
        <label for="nome">Nome:</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
      </div>
      <div class="col-lg">
        <label for="preco">Preço:</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
      </div>
    </div>
    
    <label for="descricao">Descrição:</label>
    <textarea name="description" id="descricao"  class="form-control" cols="30" rows="5" value="{{ old('description') }}"></textarea>  
    
    <div class="form-file mt-3">
      <input type="file" name="image" class="form-file-input" id="photo" />
      <label class="form-file-label" for="photo">
        <span class="form-file-text">Choose file...</span>
        <span class="form-file-button">Browse</span>
      </label>
    </div>
    
    <button class="btn btn-lg btn-success my-4" type="submit">Enviar</button>
  </form>
</div>
@endsection
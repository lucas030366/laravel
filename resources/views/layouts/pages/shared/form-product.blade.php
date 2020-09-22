@csrf

<div class="row">
  <div class="col-lg">
    <label for="nome">Nome:</label>
    <input type="text" name="name" class="form-control" value="{{ $product->name ?? old('name') }}">
  </div>
  <div class="col-lg">
    <label for="preco">Preço:</label>
    <input type="text" name="price" class="form-control" value="{{ $product->price ?? old('price') }}">
  </div>
</div>

<label for="descricao">Descrição:</label>
<textarea name="description" id="descricao"  class="form-control" cols="30" rows="5">
  {{ $product->description ?? old('description')}}  
</textarea>  

<div class="form-file mt-3">
  <input type="file" name="image" class="form-file-input" id="photo" />
  <label class="form-file-label" for="photo">
    <span class="form-file-text">Choose file...</span>
    <span class="form-file-button">Browse</span>
  </label>
</div>

<button class="btn btn-lg btn-success my-4" type="submit">Enviar</button>
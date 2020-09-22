@if($errors->any())
<ul class="lsit-unstyled">
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
</ul>
@endif
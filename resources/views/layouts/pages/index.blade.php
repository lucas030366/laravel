@extends('layouts.front.app')

@section('content')
<h3>Index</h3>    
@endsection

@push('script')
<script>
  (function(){
    window.onload = _ => {
      alert("bem vindo")
    }
  })();
</script>    
@endpush
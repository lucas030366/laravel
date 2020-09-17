@extends('layouts.front.app')

@section('content')
<h3>Index</h3>    
@endsection

@push('script')
<script>
  (function(){
    console.log("JS ok")
  })();
</script>    
@endpush
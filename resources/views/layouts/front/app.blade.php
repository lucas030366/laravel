<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  {{--<link href="/css/bootstrap.css" rel="stylesheet">--}}
  <link href="/css/mdb5.css" rel="stylesheet">
  
  <title>laravel</title>
</head>

<body>
  
  @include('layouts.front.header')
  @yield("content")
  @include('layouts.front.footer')
  
  @stack('script')
  {{--<script src="/js/bootstrap.js"></script>--}}
</body>

</html>
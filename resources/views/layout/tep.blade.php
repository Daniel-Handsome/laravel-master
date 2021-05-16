<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- //用mix 混和會把版本壓縮 然後webpack可以改如何混和 設定黨 --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js')}}" defer></script>
    <title>Document @yield('title') </title>
</head>

<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-botton shadow-sm mb-3">
        <h5 class="ny-0 mr-md-auto font-weight-normal">Laravel App</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('home.index') }}">Home</a>
            {{-- <a class="p-2 text-dark" href="{{ route('contact.show') }}">Contacnt</a> --}}
            <a class="p-2 text-dark" href="{{ route('posts.index') }}">Blog Post</a>
            <a class="p-2 text-dark" href="{{ route('posts.create') }}">Add Blog</a>
        </nav>
    </div>

   <div class="container">
    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    @yield('content')
   </div>
</body>

</html>

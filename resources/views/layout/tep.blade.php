<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document @yield('title') </title>
</head>

<body>

    @if (session('status'))
    <div style="background-color: red">session</div>
    @endif
    @yield('content')
</body>

</html>

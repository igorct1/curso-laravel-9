<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ url('images/favicon.ico.png') }}" type="image/png">
    <title>@yield('title')</title>
</head>
<body class="">
    <div class="container pt-5">
        <form action="{{ route('logout') }}" method="post" class="text-end">
            @csrf
            <button class="btn btn-danger mb-3 "type="submit">Logout</button>
        </form>
        @yield('content')
    </div>
</body>
</html>
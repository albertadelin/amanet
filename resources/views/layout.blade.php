<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="{{ asset('css/mainstyle.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/mainscript.js') }}"></script>

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="header">
        <h1>Amanet</h1>
    </div>

     <ul class="nav navbar-nav">
        <li ><a href="/">Acasa</a></li>
        <li ><a href="/contract">Contract</a></li>
        <li ><a href="/lichidari">Lichidari</a></li>
    </ul>

    
    @yield('content')

</body>
</html>
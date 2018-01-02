<!DOCTYPE html>
<html>
<head>
    <title>i9ge</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @section('css')
        <link rel="stylesheet" type="text/css" href="{{url(public_path().'css/font-awesome.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url(public_path().'css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url(public_path().'css/central_cliente.css')}}" />
    @show
</head>
<body>
<div class="container">
    @yield('main')
</div>
</body>
</html>

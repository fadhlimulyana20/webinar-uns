<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <title>{{config('app.name')}}</title>
</head>
<body>
    @include('components.navbar')

    <div class="main-body">
        @yield('content')
    </div>
</body>
</html>
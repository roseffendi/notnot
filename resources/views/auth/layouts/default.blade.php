<!DOCTYPE html>
<html>
<head>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <meta charset="UTF-8">
    <title>{{ $title or 'Whateva' }}</title>
    <link href="{{ url('css/auth.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    @yield('body')
</body>
</html>
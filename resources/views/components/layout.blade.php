<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vaxx - {{ $title }}</title>
</head>
<body>

    {{ $slot }}

    @stack('scripts')
</body>
</html>

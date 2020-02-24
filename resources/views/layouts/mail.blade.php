<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<div>
    <h2>{{ $title }}</h2>
    <p>{{ $content }}</p>
    <p>{{ $name }}</p>
    <p>{{ $email }}</p>
    <small style="color: #108ceb">{{ $footnote }}</small>
</div>
</body>
</html>

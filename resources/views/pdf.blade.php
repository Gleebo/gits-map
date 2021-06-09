<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <style></style>
    <body>
      <h1>{{ $title }}</h1>
      <img src="{{ $img }}" width="720px"/>
    </body>
</html>
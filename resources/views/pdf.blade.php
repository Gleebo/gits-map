<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <style>
      h1{
        color: red;
        text-align: center;
      }

      #container{
        /* text-align: center; */
      }

      #overlay{
        /* display: inline-block; */
        position: relative
      }
      #outer {
        /* position: absolute; */
        height: 1px;
        width: 1px;
      }

      #marker {
        height: 20px;
        width: 20px;
        /* border-radius: 100%; */
        background-color: red;
        /* position: relative; */
        top: -10px;
        left: -10px;
      }
    </style>
    <body>
      <h1>{{ $title }}</h1>
      <img src="{{ $img }}" width="720px"/>
    </body>
</html>
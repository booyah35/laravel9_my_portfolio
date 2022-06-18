<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>アマスポ</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/edit_bootstrap.css') }}" rel="stylesheet">
    </head>
    <body>
    @extends('layouts.app')

    @section('content')
        
    <div class="card">
        <img class="card-img" src="{{ asset("images/home_image.jpg") }}" alt="">
        <div class="card-img-overlay">
            <h1 class="display-4">ようこそアマスポへ！</h1>
            <h4>さあ、気軽にスポーツを楽しもう！</h4>
        </div>
    </div>
    <div>
        <h4 class="text-center container-fluid p-4">アマスポにできること</h4>
    </div>
    <div>
        <h1 class="text-center container-fluid p-4">イベントに参加する</h4>
        <ul class="navbar-nav mx-auto w-75 justify-content-between">
            <li class="d-inline"><a class="text-dark" href="">イベントを探す</a></li>
            <li class="d-inline"><a class="text-dark" href="">マイイベントを確認する</a></li>
            <li class="d-inline"><a class="text-dark" href="">レビューをする</a></li>
            <li class="d-inline"><a class="text-dark" href="">イベントを作る</a></li>
        </ul>
    </div>
    <i class="fa-solid fa-magnifying-glass"></i>
    
    
    @endsection
    </body>
</html>

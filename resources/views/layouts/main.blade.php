<!DOCTYPE html>
<html>
<head>
    <title>Cabinet</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
</head>
<body class="dp">
<div class="header">
    <div class="row grid middle between">
        <div class="logo">
            <img src="{{ asset('img/logo.png') }}">
        </div>
        <div class="title">
            Клуб любителей творчества «ОчУмелые ручки»
        </div>
        <div class="auth">
            <a href="">Вход</a>
        </div>
    </div>
</div>
<div class="row row--nogutter">
    <div class="menu-burger">
        <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<div class="main">
    <div class="row">
        @yield('content')
    </div>
</div>
<div class="row row--nogutter">
    <div class="line"></div>
</div>
<div class="footer">
    <div class="row">
        <div class="row--small grid between">
            <div class="address">Наш адрес: ВДНХ, 120в</div>
            <div class="tel">Тел: 89123456765</div>
            <div class="copy">(с) Copyright, 2017</div>
        </div>
    </div>
</div>
</body>
</html>

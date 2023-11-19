{{-- @extends('layouts.app') --}}

<html>

  <head>
      <link rel=stylesheet href='{{ asset('style.css') }}' type='text/css'>
      <title>Резюме и вакансии</title>
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  </head>

  <body>

      @section('header')
          <div class="header"><!--*****************Логотип и шапка********************-->
              Резюме и вакансии
              <div id="logo"></div>
          </div>
      @show

      <div class="rightcol"><!--*******************Навигационное меню*******************-->
          <ul class="menu">
              @yield('sidebar')
              <li><a href="{{ route('index') }}">Главная страница</a></li>
              <li><a href="{{ route('add') }}">Добавить резюме</a></li>
          </ul>
      </div>

      <div class="leftcol"><!--**************Основное содержание страницы************-->
          @yield('content')
      </div>

      @section('footer')
          <div class="footer">&copy; Copyright 2023</div>
      @show

  </body>

</html>

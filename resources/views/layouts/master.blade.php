<html>

<head>
    <link rel=stylesheet href='{{ asset('style.css') }}' type='text/css'>
    <title>@yield('title')</title>
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

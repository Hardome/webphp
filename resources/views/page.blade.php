@extends('layouts.master')

@section('sidebar')
    @parent
    <li><a href="">Вакансии</a></li>
    <li><a href="">Резюме по профессиям</a></li>
    <li><a href="">Резюме по возрасту</a></li>
    <li><a href="">Избранное резюме</a></li>
@stop

@section('content')
    @parent

    <h1>Программист</h1>


    <p class="pinline second">
        Иванов Иван<br>
        Телефон: 111111
    </p>
    <p class="pinline third">
        Стаж:
        10 лет
    </p>

    <p class="pinline second">
        Петров Петр
        <br>
        Телефон: 2222222
    </p>
    <p class="pinline third">
        Стаж:
        7 лет
    </p>

    <p class="pinline second">
        Калугин Алексей
        <br>
        Телефон: 333333
    </p>
    <p class="pinline third">
        Стаж:
        9 лет
    </p>
@stop

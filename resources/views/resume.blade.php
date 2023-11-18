@extends('layouts.master')

@section('sidebar')
    @parent
    <li><a href="./">Главная страница</a></li>
    <li><a href="">Резюме по профессиям</a></li>
    <li><a href="./add">Добавить резюме</a></li>
@stop

@section('content')
    @parent
    <div class="pinline1">
        <img class="pic" src="{{ asset('images/' . $data['avatar']) }}">
    </div>

    <p class="pinline second">
        {{ $data['lastName'] }}

        <br>
        Телефон: {{ $data['phoneNumber'] }}
    </p>

    <p class="pinline third">
        {{ $data['position'] }}
        <br>

        Стаж: {{ $data['experience'] }}
    </p>
@stop

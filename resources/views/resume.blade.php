@extends('layouts.master')

@section('sidebar')
    @parent
    <li><a href="./">Главная страница</a></li>
    <li><a href="">Резюме по профессиям</a></li>
@stop

@section('content')
    @parent
    <div class="pinline1">
        <img class="pic" src="{{ asset('images/' . $data['Image']) }}">
    </div>

    <p class="pinline second">
        {{ $data['FIO'] }}

        <br>
        Телефон: {{ $data['Phone'] }}
    </p>

    <p class="pinline third">
        {{ $data['Staff']}}
        <br>

        Стаж: {{ $data['Stage'] }}
    </p>
@stop

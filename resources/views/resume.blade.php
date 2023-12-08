@extends('layouts.master')

@section('sidebar')
    @parent
{{--    <li><a href="">Резюме по профессиям</a></li>--}}
@stop

@section('content')
    @parent
    <div class="pinline1">
        <img class="pic" src="{{ asset('storage/' . $User->Image) }}">
    </div>

    <p class="pinline second">
        {{ $User->FIO }}

        <br>
        Телефон: {{ $User->Phone }}
    </p>

    <p class="pinline third">
        {{ $User->staff->staff}}
        <br>

        Стаж: {{ $User->Stage }}
    </p>
@stop

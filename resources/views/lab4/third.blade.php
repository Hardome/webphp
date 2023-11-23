@extends('layouts.master')

@section('sidebar')
    @parent
    <li><a href="{{ route('firstQuery')}}">Первый запрос</a></li>
    <li><a href="{{ route('secondQuery')}}">Второй запрос</a></li>
    <li><a href="{{ route('fourthQuery')}}">Четвертый запрос</a></li>
@stop

@section('content')
    @parent
    <p> Количество {{$count}}
@stop

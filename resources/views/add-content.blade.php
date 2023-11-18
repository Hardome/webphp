@extends('layouts.master')

@section('sidebar')
    @parent
    <li><a href="./">Главная страница</a></li>
    <li><a href="">Резюме по профессиям</a></li>
    <li><a href="./add">Добавить резюме</a></li>
@stop

@section('content')
    @parent

    <form method="post" action="{{ route('resumeStore') }}" class="formContent">
        @csrf
        <p>ФИО <input name="FIO" type="text" value="{{old('FIO')}}">
        <p>Телефон <input name="Phone" value="{{old('Phone')}}">
        <p>Фото <input name="Image" type="file" value="{{old('Image')}}">
        <p>Профессия <input name="Staff" type="text" value="{{old('Staff')}}"/>
        <p>Стаж <input name="Stage" type="number" value="{{old('Stage')}}"/>
        <p><input type="submit" value="Добавить резюме" />
    </form>
@stop

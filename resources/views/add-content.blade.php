@extends('layouts.master')

@section('title', 'Резюме и вакансии')

@section('header')
    @parent
@stop

@section('sidebar')
    @parent
    <li><a href="./">Главная страница</a></li>
    <li><a href="">Резюме по профессиям</a></li>
    <li><a href="./add">Добавить резюме</a></li>
@stop


@section('content')
    @parent

    <form method="post" action="{{route('addPerson')}}" class="formContent">
        <div class="item">
            <label for="fullName">ФИО: </label>
            <input type="text" name="fullName" id="fullName" required />
        </div>

        <div class="item">
            <label for="phoneNumber">Телефон: </label>
            <input type="text" name="phoneNumber" id="phoneNumber" required />
        </div>

        <div class="item">
            <label for="fullName">Фото: </label>
            <input type="text" name="fullName" id="fullName" required />
        </div>

        <div class="item">
            <label for="staff">Профессия: </label>
            <input type="text" name="staff" id="staff" required />
        </div>

        <div class="item">
            <label for="stage">Стаж: </label>
            <input type="text" name="stage" id="stage" required />
        </div>

        <div class="item">
            <input type="submit" name="submit" id="submit" value="Добавить резюме"/>
        </div>
    </form>
@stop

@section('footer')
    @parent
@stop

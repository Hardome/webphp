@extends('layouts.main')

@section('content')
    <div class="hover"></div>
    <div class="title">{{ $creativity->name }}</div>
    <div class="myRow grid between" style="padding: 0 52px;">

        <div class="content">
            <img width="200" height="150" style="margin-right: 10px;" src="../storage/photos/{{ $creativity->image }}" alt="{{ $creativity->name }}">

            {{ $creativity->description }}

        </div>
        <ul class="menu" style="height: 300px;">
            <li><a href="{{ route('creativity', ['name' => 'Архитектурное моделирование']) }}">Архитектурное моделирование</a></li>
            <li><a href="{{ route('creativity', ['name' => 'Кулинария']) }}">Кулинария</a></li>
            <li><a href="{{ route('creativity', ['name' => 'Резьба по дереву']) }}">Резьба по дереву</a></li>
        </ul>
    </div>

    <div class="row shedule">
        <div class="row--small">
            <h2>Расписание</h2>
            <div class="drivers">

                @if($creativity->master_classes)

                    @foreach ($creativity->master_classes as $masterClass)
                        <div class="driver grid">
                            <div class="driver-left grid">
                                <div class="driver-photo">
                                    <img src="../storage/photos/{{ $masterClass->creator->image }}">
                                </div>
                                <div class="driver-text">
                                    <div class="driver-name">{{ $masterClass->creator->name }}</div>
                                    <div class="driver-desc">Мастер-класс «Моделирование моделей транспорта» научит
                                        основам моделирования различных видов транспортных средств.
                                        Ученики строят, испытывают и запускают модели судов,
                                        самолетов и автомобилей.
                                    </div>
                                </div>
                            </div>
                            <div class="driver-right">
                                <button class="driver-btn">записаться</button>
                                <div class="driver-time">{{ $masterClass->startAtLocale }}</div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Пока нет мастер классов для данного вида творчества</p>
                @endif
            </div>
        </div>
@endsection

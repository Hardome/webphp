@extends('layouts.main')

@section('content')
    <div class="hover"></div>
    <div class="title">«ОчУмелые ручки»</div>
    <div class="myRow grid between" style="padding: 0 52px;">

        <div class="content">
            <img width="200" height="150" style="margin-right: 10px;" src="img/21250371070_prigotovlenie-stejkov-master-klass.jpg">

            <p>Добро пожаловать в наш мир мастер-классов!</p>

            <p>
                <span>Мы - команда</span> профессиональных мастеров и преподавателей,
                предлагающих уникальные мастер-классы по различным направлениям: архитектурное моделирование, кулинария, и резьба по дереву.
            </p>

            <p>
                <span>Наши ценности</span>
            </p>

            <p>Мы стремимся к тому, чтобы каждый участник наших мастер-классов получил не только навыки и знания в выбранной области,
                но и уникальный опыт творчества и самовыражения. Мы поддерживаем дружелюбную и вдохновляющую атмосферу,
                где каждый может раскрыть свой потенциал и обогатить свои умения.</p>

            <p>
                <span>Наши курсы</span>
            </p>

            <p>1. Архитектурное моделирование:
            Изучайте основы архитектурного моделирования, создавайте удивительные проекты и погружайтесь в мир дизайна и конструкции.</p>

            <p>2. Кулинария:
            Откройте для себя мир вкуса и творчества. Наши кулинарные мастер-классы помогут вам освоить техники приготовления блюд мировой кухни.</p>

            <p> 3. Резьба по дереву:
            Погрузитесь в традиционное искусство резьбы по дереву, изучайте различные техники и создавайте уникальные произведения.</p>

            <p>
                <span>Присоединяйтесь к нам</span>
            </p>

            <p>Присоединяйтесь к нашему сообществу творческих людей и начните свой удивительный путь в мире мастерства и искусства.
                Развивайтесь, творите и вдохновляйтесь вместе с нами!</p>

        </div>
        <ul class="menu" style="height: min-content;">
            <li><a href="{{ route('creativity', ['name' => 'Архитектурное моделирование']) }}">Архитектурное моделирование</a></li>
            <li><a href="{{ route('creativity', ['name' => 'Кулинария']) }}">Кулинария</a></li>
            <li><a href="{{ route('creativity', ['name' => 'Резьба по дереву']) }}">Резьба по дереву</a></li>
            @if(Auth::user()->isMaster ?? false)
                <b><li><a href="{{ route('profile') }}">Профиль</a></li></b>
            @endif
        </ul>
    </div>

    @auth
    <div class="row shedule">
        <div class="row--small">
            <h2>Расписание</h2>
            <div class="drivers">
                @if(isset($masterClasses))
                    @foreach ($masterClasses as $masterClass)
                        <div class="driver grid" style="gap: 20px;">
                            <div class="driver-right" style="display: flex; align-items: center;">
                                @guest
                                @else
                                    @if($masterClass->hasRecord)
                                        <h1 class="driver-time" style="font-size: 16px;">
                                            Вы записаны
                                        </h1>
                                    @endif
                                @endguest
                                <div style="width: 150px;" class="driver-time">{{ $masterClass->startAtLocale }}</div>
                            </div>
                            <div class="driver-left grid">
                                <div class="driver-text" style="min-width: 625px;">
                                    <div class="driver-name">{{ $masterClass->name }}</div>
                                    <div class="driver-desc"> {{ $masterClass->description }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Вы не записаны ни на один курс</p>
                @endif
            </div>
        </div>
    @endauth
@endsection

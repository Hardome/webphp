@extends('layouts.main')

@section('header')
    <div class="row">
{{--        <a href="{{ route('rubric', ['id' => $statya->rubric->id]) }}"><h4>{{ $statya->rubric->name }}</h4></a>--}}
        <h4> </h4>
        <article>
            <div class="twelve columns">
                <h1>Английский язык для начинающих</h1>
                <p class="excerpt">
                    Начало курса: <b>14.05.2018, 18.00</b>.
                </p>
                <p class="excerpt">
                    Количество мест: <b>15</b>.
                </p>
            </div>
        </article>
    </div>
@endsection

@section('sidebar')
    @parent

@endsection

@section('content')

    <section class="section_light">
        <div class="row">
            <p> <img src="images/a2.jpg" alt="desc" width=400 align=left hspace=30>
                Цель: комплексное развитие и совершенствование таких видов речевой деятельности, как говорение и аудирование, развитие языковой и коммуникативной компетенции, преодоление языкового барьера и совершенствование навыков общения на английском языке, в том числе с носителем языка.
            </p>
        </div>
    </section>

@endsection



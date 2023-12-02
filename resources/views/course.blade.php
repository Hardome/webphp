@extends('layouts.main')

@section('header')
    <div class="row">
{{--        <a href="{{ route('rubric', ['id' => $statya->rubric->id]) }}"><h4>{{ $statya->rubric->name }}</h4></a>--}}
        <article>
            <div class="twelve columns">
                <h1>{{ $course->title }}</h1>
                <p class="excerpt">
                    Начало курса: <b>{{ date('d.m.Y, H:i', strtotime($course->startAt)) }}</b>.
                </p>
                <p class="excerpt">
                    Количество мест: <b>{{ $course->limit }}</b>.
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
            <p> <img src="../storage/{{ $course->image }}" alt="desc" width=400 align=left hspace=30>
                Цель: комплексное развитие и совершенствование таких видов речевой деятельности, как говорение и аудирование, развитие языковой и коммуникативной компетенции, преодоление языкового барьера и совершенствование навыков общения на английском языке, в том числе с носителем языка.
            </p>
        </div>
    </section>

@endsection



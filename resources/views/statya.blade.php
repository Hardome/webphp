@extends('layouts.main')

@section('header')
    <div class="row">
        <a href="{{ route('rubric', ['id' => $statya->rubric->id]) }}"><h4>{{ $statya->rubric->name }}</h4></a>
        <article>
            <div class="twelve columns">
                <h1>{{ $statya->title }}</h1>
                <p class="excerpt">
                    {{ $statya->lid }}
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
            <p> <img src="../storage/{{ $statya->image }}" alt="desc" width=400 align=left hspace=30>
                {{ $statya->content }}
            </p>
        </div>
    </section>

@endsection



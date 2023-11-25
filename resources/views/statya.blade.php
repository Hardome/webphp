@extends('layouts.main')

@section('header')
    <div class="row">
        <h4>{{ $statya->rubric->name }}</h4>
        <article>
            <div class="twelve columns">
                <h1>{{ $statya->title }}</h1>
                <p class="excerpt">
                    {{ $statya->lib }}
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
            <p> <img src="../images/{{ $statya->image }}" alt="desc" width=400 align=left hspace=30>
                {{ $statya->content }}
            </p>
        </div>
    </section>

@endsection



@extends('layouts.main')

@section('header')
    <h1>Языковая школа LINGVO</h1>
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <section>
        <div class="row">
            <section class="eight columns">
                @foreach ($news as $statya)
                    <article class="blog_post">

                        <div class="three columns">
                            <a href="{{ route('rubric', ['id' => $statya->rubricsId]) }}" class="th"><img src="storage/{{ $statya->image }}" alt="desc" /></a>
                        </div>
                        <div class="nine columns">
                            <a href="{{ route('statya', ['id' => $statya->id]) }}"><h4>{{ $statya->title }}</h4></a>
                            <p> {{ explode('.', $statya->content)[1] ??  explode('.', $statya->content)[0] }}.</p>
                        </div>
                    </article>
                @endforeach
            </section>

            @if($role === 1)
                <section class="four columns">
                    <H3>  &nbsp; </H3>
                    <div class="panel">
                        <h3>Админ-панель</h3>
                        <ul class="accordion">
                            <li class="active">
                                <div class="title">
                                    <a href="{{ route('add') }}"><h5>Добавить статью</h5></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            @endif
        </div>
    </section>
@endsection



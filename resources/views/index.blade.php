@extends('layouts.main')

@section('header')
    <h1>Новости науки</h1>
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <section>

        <div class="section_main">

            <div class="row">

                <section class="eight columns">

                    @foreach ($news as $statya)
                        <article class="blog_post">

                            <div class="three columns">
                                <a href="#" class="th"><img src="images/{{ $statya->image }}" alt="desc" /></a>
                            </div>
                            <div class="nine columns">
                                <a href="#"><h4>{{ $statya->title }}</h4></a>
                                <p> Первое предложение новости 1.</p>
                            </div>
                        </article>
                    @endforeach
                </section>

            </div>

        </div>

    </section>
@endsection



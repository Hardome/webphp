@extends('layouts.main')

@section('header')
    <h1>Новости науки</h1>
@endsection

@section('sidebar')
    @parent

    <script type="text/javascript">
        //<![CDATA[
        $('ul#menu-header').nav-bar();
        //]]>
    </script>
@endsection

@section('content')
    <section>
        <div class="section_main">

            <div class="row">

                <section class="eight columns">

                    <h3>{{$rubric->name}}</h3>

                    @foreach ($news as $statya)
                        <article class="blog_post">

                            <div class="three columns">
                                <a href="{{ route('rubric', ['id' => $statya->rubricsId]) }}" class="th"><img src="../images/{{ $statya->image }}" alt="desc" /></a>
                            </div>
                            <div class="nine columns">
                                <a href="{{ route('statya', ['id' => $statya->id]) }}"><h4>{{ $statya->title }}</h4></a>
                                <p> {{ explode('.', $statya->content)[1] }}.</p>
                                <div > <a href="" >Удалить</a></div>
                            </div>
                        </article>
                    @endforeach
                </section>


                <section class="four columns">
                    <H3>  &nbsp; </H3>
                    <div class="panel">
                        <h3>Админ-панель</h3>

                        <ul class="accordion">
                            <li class="active">
                                <div class="title">
                                    <a href="#"><h5>Добавить статью</h5></a>
                                </div>

                            </li>
                        </ul>

                    </div>
                </section>

            </div>

        </div>

    </section>
@endsection



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

                    <h3>Искусственный интеллект</h3>

                    <article class="blog_post">

                        <div class="three columns">
                            <a href="#" class="th"><img src="images/a1.jpg" alt="desc" /></a>
                        </div>
                        <div class="nine columns">
                            <a href="#"><h4>Название 1</h4></a>
                            <p> Первое предложение новости 1.</p>
                            <div > <a href="" >Удалить</a></div>
                        </div>

                    </article>

                    <article class="blog_post">

                        <div class="three columns">
                            <a href="#" class="th"><img src="images/thumb2.jpg" alt="desc" /></a>
                        </div>
                        <div class="nine columns">
                            <a href="#"><h4>Название 2</h4></a>
                            <p> Первое предложение новости 2.</p>
                            <div > <a href="" >Удалить</a></div>
                        </div>

                    </article>

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



@extends('layouts.main')

@section('header')
    <div class="row">
        <h4>Автоматическая обработка текста</h4>
        <article>
            <div class="twelve columns">
                <h1>За переводы в Facebook теперь полностью отвечает искусственный интеллект</h1>
                <p class="excerpt">
                    Facebook долгое время работала над улучшением переводов текста в публикациях и комментариях.
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
                Теперь она объявила о том, что эта работа завершена. Благодаря искусственному интеллекту переводы в социальной сети станут гораздо точнее. Раньше Facebook использовала модели машинного перевода на основе фраз. Система разбивала предложения на слова или словосочетания, из-за чего качество перевода целого предложения зачастую оставляло желать лучшего. Особенно сильно это было заметно, когда сервис переводил на язык со структурой, которая значительно отличается от структуры языка оригинального текста. Теперь сайт переводит с помощью нейронных сетей, которые принимают во внимание содержимое всего предложения, а также его контекст. Благодаря этом перевод становится в разы точнее и живее. Пример представлен на картинке. Первый вариант — результат работы фразовой системы, второй — нейронной сети.
            </p>
        </div>
    </section>

@endsection



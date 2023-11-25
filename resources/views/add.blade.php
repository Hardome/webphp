@extends('layouts.main')

@section('header')
    <h1>Добавить статью</h1>
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <section>
        <div class="row">
            <section class="eight columns">
                <form method="post" action="{{ route('storeNews') }}" class="formContent">
                    @csrf
                    <p>Заголовок <input name="title" type="text" value="{{old('title')}}">
                    <p>Lid <input name="lid" value="{{old('lid')}}">
                    <p>Фото <input name="image" type="file" value="{{old('image')}}">

                    <p>Рубрика <select name="rubricsId">
                            @foreach ($rubrics as $rubric)
                                @if (old('Staff') == $rubric->id)
                                    <option value="{{$rubric->id}}" selected>{{$rubric->name}}</option>
                                @else
                                    <option value="{{$rubric->id}}">{{$rubric->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    <p>Текст статьи <input name="content" type="string" value="{{old('content')}}"/>
                    <p><input type="submit" value="Добавить статью" />
                </form>
            </section>
        </div>
    </section>
@endsection



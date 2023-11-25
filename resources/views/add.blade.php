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
                <form method="post" action="{{ route('storeNews') }}" class="formContent" enctype="multipart/form-data">
                    @csrf
                    <p>Заголовок <input name="title" type="text" value="{{old('title')}}">
                    <p>Lid <input name="lid" type="text" value="{{old('lid')}}">
                    <p>Фото <input name="image" type="file" value="{{old('image')}}">

                    <p>Рубрика <select name="rubricsId">
                            @foreach ($rubrics as $rubric)
                                @if (old('rubricsId') == $rubric->id)
                                    <option value="{{$rubric->id}}" selected>{{$rubric->name}}</option>
                                @else
                                    <option value="{{$rubric->id}}">{{$rubric->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    <p>Текст статьи <textarea name="content" type="text" value="{{old('content')}}" rows="4" cols="50"></textarea>
                    <p><input type="submit" value="Добавить статью" />
                </form>
            </section>
        </div>
    </section>
@endsection



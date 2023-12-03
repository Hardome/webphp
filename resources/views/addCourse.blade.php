@extends('layouts.main')

@section('header')
    <h1>Добавить курс</h1>
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
    <section>
        <div class="row">
            <section class="eight columns">
                <form method="post" action="{{ route('storeCourse') }}" class="formContent" enctype="multipart/form-data">
                    @csrf
                    <p>Название <input name="title" type="text" value="{{old('title')}}">
                    <p>Описание <textarea name="description" type="text" rows="4" cols="50">{{old('description')}}</textarea>
                    <p>Дата и время начала <input name="startAt" type="datetime-local" value="{{old('startAt')}}">
                    <p>Фото <input name="image" type="file" value="{{old('image')}}">
                    <p>Количество участников <input name="limit" type="number" value="{{old('limit')}}">
                    <p>Язык <select class="form-select" name="languageGroupId">
                            <option selected disabled hidden="">Выбрать</option>
                            @foreach ($groups as $language)
                                @if (old('rubricsId') == $language->id)
                                    <option value="{{$language->id}}" selected>{{$language->name}}</option>
                                @else
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                @endif
                            @endforeach
                        </select>

                    <p><input type="submit" value="Добавить курс" />
                </form>
            </section>
        </div>
    </section>
@endsection



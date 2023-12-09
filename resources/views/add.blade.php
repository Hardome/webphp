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
                    <p>Заголовок <input name="title" class="form-control @error('title') is-invalid @enderror"
                                        type="text" value="{{old('title')}}">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <p>Lid <input name="lid" class="form-control @error('lid') is-invalid @enderror" type="text"
                                  value="{{old('lid')}}">
                    @error('lid')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <p>Фото <input name="image" class="form-control @error('image') is-invalid @enderror" type="file"
                                   value="{{old('image')}}">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <p>Рубрика <select name="rubricsId" class="form-control @error('rubricsId') is-invalid @enderror">
                            @foreach ($rubrics as $rubric)
                                @if (old('rubricsId') == $rubric->id)
                                    <option value="{{$rubric->id}}" selected>{{$rubric->name}}</option>
                                @else
                                    <option value="{{$rubric->id}}">{{$rubric->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    @error('rubricsId')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <p>Текст статьи <textarea name="content" class="form-control @error('content') is-invalid @enderror"
                                              type="text" value="{{old('content')}}" rows="4" cols="50"></textarea>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <p><input type="submit" value="Добавить статью"/>
                </form>
            </section>
        </div>
    </section>
@endsection



@extends('layouts.master')

@section('sidebar')
    @parent
    <li><a href="">Резюме по профессиям</a></li>
@stop

@section('content')
    @parent

    <form method="post" action="{{ route('storeResume') }}" class="formContent">
        @csrf
        <p>ФИО <input name="FIO" type="text" value="{{old('FIO')}}">
        <p>Телефон <input name="Phone" value="{{old('Phone')}}">
        <p>Фото <input name="Image" type="file" value="{{old('Image')}}">

        <p>Профессия <select name="Staff">
          @foreach ($staffs as $staff)
            @if (old('Staff') == $staff->id)
            <option value="{{$staff->id}}" selected>{{$staff->staff}}</option>
            @else
              <option value="{{$staff->id}}">{{$staff->staff}}</option>
            @endif
          @endforeach
        </select>

        <p>Стаж <input name="Stage" type="number" value="{{old('Stage')}}"/>
        <p><input type="submit" value="Добавить резюме" />
    </form>
@stop

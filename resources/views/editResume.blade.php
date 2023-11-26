@extends('layouts.master')

@section('sidebar')
    @parent
    <li><a href="">Вакансии</a></li>
    <li><a href="">Резюме по профессиям</a></li>
    <li><a href="">Резюме по возрасту</a></li>
    <li><a href="">Избранное резюме</a></li>
@stop

@section('content')
    @parent

    <div class="pinline1">
        <img class="pic" src="{{ asset('storage/' . $person->Image) }}">
    </div>

    <form method="post" action="{{ route('updateResume', $person->id) }}" class="formContent" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>ФИО <input name="FIO" type="text" value="{{ $person->FIO ?? old('FIO') }}">
        <p>Телефон <input name="Phone" value="{{ $person->Phone ?? old('Phone') }}">
        <p>Фото <input name="Image" type="file" value="{{ $person->Image ?? old('Image')}}">

        <p>Профессия <select name="Staff">
          @foreach ($staffs as $staff)
            @if ($person->Staff == $staff->id || old('Staff') == $staff->id)
              <option value="{{$staff->id}}" selected>{{$staff->staff}}</option>
            @else
              <option value="{{$staff->id}}">{{$staff->staff}}</option>
            @endif
          @endforeach
        </select>

        <p>Стаж <input name="Stage" type="number" value="{{ $person->Stage ?? old('Stage')}}"/>
        <p><input type="submit" value="Изменить резюме" />
    </form>
@endsection

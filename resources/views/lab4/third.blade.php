@extends('layouts.master')

@section('sidebar')
    @parent


    <li><a href="{{ route('firstQuery')}}">Первый запрос</a></li>
    <li><a href="{{ route('secondQuery')}}">Второй запрос</a></li>
    <li><a href="">Четвертый запрос</a></li>
@stop

@section('content')
    @parent
    <p> Количество {{$count}}

    {{-- <table style="width: 50%">
      <tr style="border-bottom: 1px solid black">
        <td>&nbsp;</td>
        <td>Id</td>
        <td>ФИО</td>
        <td>Стаж</td>
      </tr>
      @foreach ($Persons as $person)

        <tr>
          <td>&nbsp;</td>
          <td>{{ $person->id }}</td>
          <td>{{ $person->FIO }}</td>
        </tr>

      @endforeach
    </table> --}}
@stop

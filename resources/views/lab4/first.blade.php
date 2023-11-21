@extends('layouts.master')

@section('sidebar')
    @parent
@stop

@section('content')
    @parent

    <table>
      <tr>
        <td>&nbsp;</td>
        <td>Id</td>
        <td>ФИО</td>
        <td>Стаж</td>
      </tr>
      @foreach ($Persons as $person)
        {{-- <p class="pinline second resumeItem" style="color: black">
          Id: {{ $person->id }}
          <span class="pinline third"> Стаж: {{ $person->Stage }} лет</span>
        </p> --}}

        <tr>
          <td>&nbsp;</td>
          <td>{{ $person->id }}</td>
          <td>{{ $person->FIO }}</td>
          <td>{{ $person->Stage }}</td>
        </tr>

      @endforeach
    </table>
@stop

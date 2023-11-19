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

    @foreach ($Persons as $person)
      <a href="{{route('editResume', $person->id)}}">
        <p class="pinline second resumeItem" style="color: black">
            {{ $person->FIO }}, Телефон: {{ $person->Phone }}
            <span class="pinline third"> Стаж: {{ $person->Stage }} лет</span>
        </p>
      </a>
        <form action="{{ route('deleteResume', $person->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
    @endforeach
    {{ $Persons->links() }}
@endsection

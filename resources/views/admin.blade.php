@extends('layouts.main')

<script>
    function getMarks(value) {
        const mark = value;

        if (mark) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("mark").disabled = false;
                    document.getElementById("mark").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "courseRecords/" + mark, true);
            xmlhttp.send();
        }
    }
</script>

@section('header')
    <div class="row">
        {{--        <a href="{{ route('rubric', ['id' => $statya->rubric->id]) }}"><h4>{{ $statya->rubric->name }}</h4></a>--}}
        <article>
            <div class="twelve columns">
                <h1>Выберите курс:</h1>
                    <select class="form-select" onchange="getMarks(this.value)">
                        <option selected disabled hidden="">Выбрать</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
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
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИО</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach ($records as $record)--}}
{{--                    <tr>--}}
{{--                        <th scope="row">1</th>--}}
{{--                        <td>{{ $record->course['title'] }}</td>--}}
{{--                        <td>{{ date('d.m.Y, H:i', strtotime($record->course['startAt'])) }}</td>--}}
{{--                        <td>--}}
{{--                            @if($record->canDeleteRecord)--}}
{{--                                <form id="delete-form" action="{{ route('deleteRecord', ['id' => $record->id]) }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button type="submit">Удалить запись</button>--}}
{{--                                </form>--}}
{{--                            @else--}}
{{--                                До начала курса менее одних суток--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>
        </div>
    </section>

@endsection



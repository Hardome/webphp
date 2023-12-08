@extends('layouts.master')

@section('sidebar')
  @parent
  {{--    <li><a href="">Вакансии</a></li>--}}
  {{--    <li><a href="">Резюме по профессиям</a></li>--}}
  {{--    <li><a href="">Резюме по возрасту</a></li>--}}
  {{--    <li><a href="">Избранное резюме</a></li>--}}
@stop

@section('content')
  @parent

  <div class="pinline1">
    <img class="pic" src="{{ asset('storage/' . $person->Image) }}">
  </div>

  <form method="post" action="{{ route('updateResume', $person->id) }}" class="formContent"
        enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <p>ФИО <input name="FIO" type="text" class="form-control @error('FIO') is-invalid @enderror"
                  value="{{ $person->FIO ?? old('FIO') }}">
      @error('FIO')
      <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
    @enderror

    <p>Телефон <input name="Phone" class="form-control @error('Phone') is-invalid @enderror"
                      value="{{ $person->Phone ?? old('Phone') }}">
      @error('Phone')
      <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
    @enderror

    <p>Фото <input name="Image" class="form-control @error('Image') is-invalid @enderror" type="file"
                   value="{{ $person->Image ?? old('Image')}}">
      @error('Image')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror

    <p>Профессия <select name="Staff" class="form-control @error('Staff') is-invalid @enderror">
        @foreach ($staffs as $staff)
          @if ($person->Staff == $staff->id || old('Staff') == $staff->id)
            <option value="{{$staff->id}}" selected>{{$staff->staff}}</option>
          @else
            <option value="{{$staff->id}}">{{$staff->staff}}</option>
          @endif
        @endforeach
      </select>
      @error('Staff')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror

    <p>Стаж <input name="Stage" type="number" value="{{ $person->Stage ?? old('Stage')}}"
                   class="form-control @error('Stage') is-invalid @enderror"/>
      @error('Stage')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
     </span>
    @enderror

    <p><input type="submit" value="Изменить резюме"/>
  </form>
@endsection

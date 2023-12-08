@extends('layouts.master')

@section('sidebar')
  @parent
  {{--    <li><a href="">Резюме по профессиям</a></li>--}}
@stop

@section('content')
  @parent

  <form method="post" action="{{ route('storeResume') }}" class="formContent" enctype="multipart/form-data">
    @csrf
    <p>ФИО <input name="FIO" class="form-control @error('FIO') is-invalid @enderror" type="text" value="{{old('FIO')}}">
      @error('FIO')
      <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
    @enderror

    <p>Телефон <input name="Phone" class="form-control @error('Phone') is-invalid @enderror" value="{{old('Phone')}}">
      @error('Phone')
      <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
    @enderror

    <p>Фото <input name="Image" class="form-control @error('Image') is-invalid @enderror" type="file"
                   value="{{old('Image')}}">
      @error('Image')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror

    <p>Профессия <select name="Staff" class="form-control @error('Staff') is-invalid @enderror">
        @foreach ($staffs as $staff)
          @if (old('Staff') == $staff->id)
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

    <p>Стаж <input name="Stage" type="number" class="form-control @error('Stage') is-invalid @enderror"
                   value="{{old('Stage')}}"/>
      @error('Stage')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
     </span>
    @enderror
    <p><input type="submit" value="Добавить резюме"/>
  </form>
@stop

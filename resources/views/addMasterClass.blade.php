@extends('layouts.main')

@section('content')
    <div class="row row--nogutter top-line">
        <div class="line"></div>
    </div>
    <div class="myRow grid between" style="padding: 0 52px;">
        <form method="post" action="{{ route('storeMasterClass') }}" enctype="multipart/form-data">
            @csrf
            <h2>Форма добавления мастер-класса</h2>
            <div class="form-group">
                <label>Вид творчества</label>
                <select class="form-select" class="form-control @error('creativityId') is-invalid @enderror"
                        name="creativityId">
                    @foreach ($creativity as $creative)
                        @if (old('creativityId') == $creative->id)
                            <option value="{{$creative->id}}" selected>{{$creative->name}}</option>
                        @else
                            <option value="{{$creative->id}}">{{$creative->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('creativityId')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Название мастер-класса</label>
                <input name="name"
                       class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Описание мастер-класса</label>
                <textarea name="description"
                          class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? ''}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Стоимость мастер-класса</label>
                <input min="1" name="cost" class="form-control @error('cost') is-invalid @enderror" type="number"
                       value="{{old('cost')}}">
                @error('cost')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Дата</label>
                <input type="date" id="date" name="date" class="date form-control @error('date') is-invalid @enderror"
                       value="{{old('date')}}">
                @error('date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Время</label>
                <input type="time" id="time" name="time" step="7200" min="09:00" max="15:00"
                       class="form-control @error('time') is-invalid @enderror"
                       value="{{old('time')}}">
                @error('time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label>Количество человек в группе</label>
                <input min="1" name="limit" class="form-control @error('limit') is-invalid @enderror" type="number"
                       value="{{old('limit')}}">
                @error('limit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Отправить">
            </div>
        </form>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function () {
            $('.date').change(function () {
                const date = this.value;

                $.ajax({
                    url: "getEmptyTimeByDate",
                    type: 'GET',
                    data: {
                        date: date
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (response) => {
                        const timeInput = document.getElementById('time');

                        if (response.includes(timeInput.value)) {
                            timeInput.setCustomValidity('Эта дата недоступна');
                        } else {
                            timeInput.setCustomValidity('');
                        }

                        timeInput.addEventListener('input', function () {
                            if (response.includes(timeInput.value)) {
                                this.setCustomValidity('Эта дата недоступна');
                            } else {
                                this.setCustomValidity('');
                            }
                        });
                    }
                })
            })
        })
    </script>
@endsection

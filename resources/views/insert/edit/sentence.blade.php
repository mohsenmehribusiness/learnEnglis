@extends('layouts.master')

@section('css')
    <style>
        .boxxx-shadow{
            -webkit-box-shadow: 5px 9px 5px -6px rgba(255,192,84,1);
            -moz-box-shadow: 5px 9px 5px -6px rgba(255,192,84,1);
            box-shadow: 5px 9px 5px -6px rgba(255,192,84,1);;
        }
    </style>
    <!-- bootstrap-multiSelect -->
    <link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
    <!-- bootstrap-multiSelect -->
@endsection

@section('content')
    <div class="row">
        <h5>edit Sentence</h5>
    </div>
    <div class="row boxxx-shadow rounded border border-warning">
        <div class="col">
            <form class="@error('word') was-validated @enderror @error('persian') was-validated @enderror pt-5 pb-5"
                  action="{{ route('insert.sentence.edit.post',['word'=>$word])}}" method="POST" novalidate>
                @csrf
                <input type="number" style="visibility:hidden !important;" name="id" value="{{ $word->id }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" id="word" name="word" placeholder="english" value="{{ $word->word }}" required>
                        @error('word')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="persian" value="{{setValueArray($word,'persians')}}" name="persian" placeholder="persian words..." required>
                    @error('persian')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="tag" name="tag" value="{{setValueArray($word,'tags')}}" placeholder="tags..." >
                </div>
                <div class="mb-3">
                    <select class="my-select selectpicker" name="lesson[]"  data-live-search="true" data-size="3"  multiple>
                        <option hidden >Display but don't show in list</option>
                        @php $lessons=\App\Lesson::all();  @endphp
                        @foreach($lessons as $lesson)
                            <option value="{{$lesson->id}}" {{($word->lessons()->pluck('id'))->contains($lesson->id) ? 'selected' : null }} data-tokens="{{ $lesson->lesson }}">
                                {{ $lesson->lesson }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- more .. -->
                <hr class="mb-4">
                <button class="btn btn-outline-warning btn-lg btn-block" type="submit">edit</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.my-select') .selectpicker({dropupAuto: false});
    </script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('js/bootstrap-select.min.js') }}"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/i18n/defaults-*.min.js"></script>
    <script>
        @error('lesson')
        $('#insert_lesson_modal').modal('show');
        @enderror
    </script>
@endsection

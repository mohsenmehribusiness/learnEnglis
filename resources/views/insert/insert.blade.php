@extends('layouts.master')

@section('content')
    <div class="row mt-5">
        <div class="col-md-4 order-md-2 mb-4">
            @include('insert.side')
        </div>
        <div class="col-md-8 order-md-1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="word-tab" data-toggle="tab" href="#word_nav" role="tab" aria-controls="word" aria-selected="true">Word</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="sentence-tab" data-toggle="tab" href="#sentence_nav" role="tab" aria-controls="sentence" aria-selected="false">Sentence</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="word_nav" role="tabpanel" aria-labelledby="word-tab">
                    <a href="{{ route('insert.multi.word') }}" class="text-muted float-right" style="font-size:75%;">insert multi words</a>
                    @include('insert.WordForm')
                </div>
                <div class="tab-pane fade" id="sentence_nav" role="tabpanel" aria-labelledby="sentence-tab">
                    <a href="{{ route('insert.multi.sentence') }}" class="text-muted float-right" style="font-size:75%;">insert multi sentences</a>
                    @include('insert.SentenceForm')
                </div>
            </div>
        </div>
    </div>
    @include('insert.modalLessonForm')
@endsection

@section('script')
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('js/bootstrap-select.min.js') }}"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
     <script>
        @error('lesson')
        $('#insert_lesson_modal').modal('show');
        @enderror
        $('.my-select') .selectpicker({dropupAuto: false});
    </script>
@endsection

@section('css')
    <!-- bootstrap-multiSelect -->
    <link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
    <!-- bootstrap-multiSelect -->
@endsection

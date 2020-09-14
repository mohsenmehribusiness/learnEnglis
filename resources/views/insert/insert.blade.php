@extends('layouts.master')

@section('content')
    <div class="row mt-5">
        <div class="col-md-4 order-md-2 mb-4">
            @include('insert.side')
        </div>
        <div class="col-md-8 order-md-1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#word_nav" role="tab" aria-controls="home" aria-selected="true">Word</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#sentence_nav" role="tab" aria-controls="profile" aria-selected="false">Sentence</a>
                </li>
            </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="word_nav" role="tabpanel" aria-labelledby="home-tab">
                        @include('insert.WordForm')
                    </div>
                    <div class="tab-pane fade" id="sentence_nav" role="tabpanel" aria-labelledby="profile-tab">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/i18n/defaults-*.min.js"></script>
<script>
@error('lesson')
    $('#insert_lesson_modal').modal('show');
@enderror
</script>
@endsection

@section('css')
    <!-- bootstrap-multiSelect -->
    <link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
    <!-- bootstrap-multiSelect -->
@endsection

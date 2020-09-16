@extends('layouts.master')

@section('content')
   {{-- @include('tags.listItem')--}}
    <div class="row">
        <div class="col">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tagAll" role="tabpanel" aria-labelledby="all-tab">
                   @include('tags.tagTab',['letters'=>$letters,'objects'=>$objects])
                </div>
                {{--<div class="tab-pane fade" id="tagWord" role="tagWord" aria-labelledby="word-tab">
                </div>
                <div class="tab-pane fade" id="tagSentence" role="tagSentence" aria-labelledby="sentence-tab">
                </div>--}}
            </div>
        </div>
    </div>
@endsection

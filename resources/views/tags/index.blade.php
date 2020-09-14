@extends('layouts.master')

@section('css')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <ul class="nav nav-tabs text-center" id="myTab" role="tablist" style="justify-content: space-around;">
                <li class="nav-item">
                    <a class="nav-link text-muted active" id="all-tab" data-toggle="tab" href="#tagAll" role="tab" aria-controls="tagAll" aria-selected="true">{{ucfirst($general)}} All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" id="word-tab" data-toggle="tab" href="#tagWord" role="tab" aria-controls="tagWord" aria-selected="false">{{ucfirst($general)}} Words</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-muted" id="sentence-tab" data-toggle="tab" href="#tagSentence" role="tab" aria-controls="tagSentence" aria-selected="false">{{ucfirst($general)}} Sentences</a>
                </li>
            </ul>
        </div>
    </div>
    @php
    @endphp
    <div class="row">
        <div class="col">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tagAll" role="tabpanel" aria-labelledby="all-tab">
                   @include('tags.tagTab',['letters'=>$letters,'objects'=>$objects])
                </div>
                <div class="tab-pane fade" id="tagWord" role="tagWord" aria-labelledby="word-tab">
                </div>
                <div class="tab-pane fade" id="tagSentence" role="tagSentence" aria-labelledby="sentence-tab">
                </div>
            </div>
        </div>
    </div>
@endsection

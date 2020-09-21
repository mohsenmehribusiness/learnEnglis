@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-8 border-right">
        @include('exam.formSpecialExam')
    </div>
    <div class="col-4">
        <nav class="nav flex-column">
            <a class="nav-link box-shadow m-2 text-muted border py-3  text-center " href="{{ route('exam.option',['number'=>20,'option'=>'wordAll']) }}">
                <i class="fa pr-1 fa-file-word-o"></i>
                All Words</a>
            <a class="nav-link box-shadow m-2 text-muted border py-3  text-center " href="{{ route('exam.option',['number'=>20,'option'=>'wordCheck']) }}">
                <i class="fa pr-1 fa-check"></i>
                State Words</a>
            <a class="nav-link box-shadow m-2 text-muted border py-3  text-center " href="{{ route('exam.option',['number'=>20,'option'=>'wordTimes']) }}">
                <i class="fa pr-1 fa-times"></i>
                State Words</a>
            <a class="nav-link box-shadow m-2 text-muted border py-3  text-center " href="{{ route('exam.option',['number'=>20,'option'=>'sentenceAll']) }}">
                <i class="fa pr-1 fa-quote-right"></i>
                All Sentences</a>
            <a class="nav-link box-shadow m-2 text-muted border py-3  text-center " href="{{ route('exam.option',['number'=>20,'option'=>'sentenceCheck']) }}">
                <i class="fa pr-1 fa-check"></i>
                State Sentences</a>
            <a class="nav-link box-shadow m-2 text-muted border py-3  text-center " href="{{ route('exam.option',['number'=>20,'option'=>'sentenceTimes']) }}">
                <i class="fa pr-1 fa-times"></i>
                State Sentences</a>
            <a class="nav-link box-shadow m-2 text-muted border py-3  text-center " href="{{ route('exam.option',['number'=>20,'option'=>'sentenceUsage']) }}">
                <i style="opacity:0.8;" class="fa pr-1 fa fa-file-excel-o"></i>
                Just Sentences
            </a>
        </nav>
    </div>
</div>
@endsection

@section('css')
@endsection

@section('script')
@endsection

@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-6 border">
        </div>
        <div class="col-6 p-5">
            <div class="row">
                @foreach($details as $key=>$value)
                    <div class="col-lg-5 my-1 py-1 text-center box-shadow px-2 pt-2 mx-1">
                        <a href="">
                            <i class="fa {{ array_pop($icons) }} fa-5x" aria-hidden="true"></i>
                            <p>
                            <h4 class="float-left">
                                {{ $key }}
                            </h4>
                            <h4 class="float-right">
                                {{ $value }}
                            </h4>
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('script')
@endsection

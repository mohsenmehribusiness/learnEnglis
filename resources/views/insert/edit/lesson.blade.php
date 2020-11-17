@extends('layouts.master')
@section('css')
    <style>
        .boxxx-shadow{
            -webkit-box-shadow: 5px 9px 5px -6px rgba(255,192,84,1);
            -moz-box-shadow: 5px 9px 5px -6px rgba(255,192,84,1);
            box-shadow: 5px 9px 5px -6px rgba(255,192,84,1);;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <h5>edit word : </h5>
    </div>
    <div class="row boxxx-shadow rounded border border-warning">
        <div class="col">
            <form class="@error('lesson') was-validated @enderror form mt-5" action="{{ route('insert.lesson')}}" method="POST" novalidate>
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="lesson" name="lesson" placeholder="lesson" value="" required>
                    @error('lesson')
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea id="description" name="description" class="ckeditor"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="tags ..." >
                </div>
                <button class="btn btn-success my-3 btn-block" type="submit">insert lesson</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection

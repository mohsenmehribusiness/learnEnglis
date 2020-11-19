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
        <div class="col py-3">
            <h4>
                <span class="text-muted" style="font-size:50%!important;">edit Tag </span> {{ $tag->tag }}
            </h4>
        </div>
    </div>
    <div class="row boxxx-shadow rounded border border-warning">
        <div class="col">
            <form class="@error('lesson') was-validated @enderror form mt-5" action="{{ route('insert.tag.edit.post',['tag'=>$tag])}}" method="POST" novalidate>
                @csrf
                <input type="text" class="hidden" style="visibility: hidden !important;" name="id" value="{{ $tag->id }}">
                <div class="form-group">
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="tag" value="{{ $tag->tag }}" required>
                    @error('tag')
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-outline-warning my-3 btn-block" type="submit">edit tag</button>
            </form>
        </div>
    </div>
@endsection

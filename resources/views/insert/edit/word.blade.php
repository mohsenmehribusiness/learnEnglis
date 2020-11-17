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
            <form class="@error('word') was-validated @enderror @error('persian') was-validated @enderror pt-5 pb-5"
                  action="{{ route('insert.word.edit.post',['word'=>$word])}}" method="POST" novalidate>
                @csrf
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
                    <input type="text" class="form-control" id="sentence" name="sentence" value="{{setValueArray($word,'sentences','word')}}" placeholder="sentences..." >
                </div>
                <!-- more .. -->
                <hr class="mb-4">
                <button class="btn btn-outline-warning btn-lg btn-block" type="submit">Insert</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection

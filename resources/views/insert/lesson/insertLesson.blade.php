@extends('layouts.master')

@section('content')
    <div class="row">
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
                <button class="btn btn-success my-3 btn-block" type="submit">insert lesson</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ url('plugins/ckeditor/ckeditor.js') }}"></script>
    $(document).ready(function(){
        CKEditor.replace('description');
    });
@endsection

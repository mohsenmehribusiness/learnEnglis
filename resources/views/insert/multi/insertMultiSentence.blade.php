@extends('layouts.master')

@section('content')
    <div class="row mt-5">
        <form id="formMultiWord" action="{{route('insert.multi.sentence.post')}}" method="post" class="form-inline">
            @csrf
        </form>
        <a class="btn btn-block mx-5 " id="plusInput" type="submit"><i class="fa fa-plus" style="color:green;" aria-hidden="true"></i></a>
        <button class="btn btn-block btn-success mx-5 mt-4" id="insertAll" type="submit">Insert</button>
    </div>
@endsection

@section('script')
    <script>
        let idFormMultiWord=0;
        function addInputsForm(){
            idFormMultiWord++;
            let formMultiWord=`
            <div class="form-group my-2" id="formGroup_`+idFormMultiWord+`">
            <span class="badge badge-pill badge-secondary ml-2">`+idFormMultiWord+`</span>
            <input type="text" class="form-control mx-1" name="`+idFormMultiWord+`[sentence]" id="sentence" placeholder="sentence" >
            <input type="text" class="form-control mx-1" id="persian" name="`+idFormMultiWord+`[persian]" placeholder="persian sentences..." required>
            <input type="text" class="form-control mx-1" id="tag" name="`+idFormMultiWord+`[tag]" placeholder="tags..." >
            </div>`;
            $('#formMultiWord').append(formMultiWord);
        }
        $(document).ready(function(){
            //just once
            addInputsForm();
            //just once
            $('#plusInput').click(function(){
                addInputsForm();
            });
            $('#insertAll').click(function(){
                $('#formMultiWord').submit();
            });
        });

    </script>
    {{--<!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('js/bootstrap-select.min.js') }}"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/i18n/defaults-*.min.js"></script>--}}
@endsection

@section('css')
    {{-- <!-- bootstrap-multiSelect -->
     <link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
     <!-- bootstrap-multiSelect -->--}}
@endsection

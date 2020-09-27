@extends('layouts.master')

@section('content')
    @include('study.moreSetting')
    <table class="table" id="studyTable">
        <thead>
        <tr>
            <th>
                <label id="thNumber">
                    <i id="iconNumber" class="fa fa-circle text-muted"></i>
                    Number
                </label>
            </th>
            <th>
                <label id="thWord">
                    <i id="iconWord" class="fa fa-align-center text-muted"></i>
                    English
                </label>
            </th>
            <th>
                <label id="visiblePersian" class="label">
                    <i id="iconVisiblePersian" class="fa fa-eye text-muted"></i>
                    Persian
                </label>
            </th>
            <th>
                <input class="form-check-input m-1 p-1 position-static" style="opacity:0.1;" type="checkbox" id="settingth" >
                <label for="settingth" id="settingthlabel" class="label text-muted">Setting</label>
            </th>
        </tr>
        </thead>
    </table>
    <!-- modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content px-3 py-4" style="background-color:#fffdd0;">
                <h4 class="font-weight-bold"><span id="english_text_modal"></span></h4>
                <div class="float-right">
                    <h6 class="float-right" style="direction:rtl !important;">
                        <span id="persian_text_modal"></span>
                    </h6>
                </div>
                <br>
                <span class="text-muted">sentences</span>
                <ol class="px-4 py-4" id="sentences_text_modal">
                </ol>
            </div>
        </div>
    </div>
    <!-- modal -->
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/study.css') }}">
    <!-- yajra datatable -->
    <link rel="stylesheet" href="{{ url('css/jquery.dataTables.min.css') }}">
    <!-- yajra datatable -->
@endsection

@section('script')
    <script src = "{{ url('js/jqueryAjax.min.js') }}"></script>
    <script src = "{{ url('js/study.js') }}"></script>

    <!-- yajra datatable -->
    <script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(function(){
                $('#studyTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route($routes["ajax"]) }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'word', name: 'word' },
                        { data: 'persian', name: 'persian' ,orderable:false,searchable:false},
                        { data: 'setting', name: 'setting',orderable:false,searchable:false },
                    ]
                });
            });
        });
    </script>
    <!-- yajra datatable -->
@endsection

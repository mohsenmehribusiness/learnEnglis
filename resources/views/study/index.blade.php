@extends('layouts.master')

@section('content')
    @include('study.moreSetting')
    <table class="table table-bordered" id="users-table">
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
    <script>
        checkstate=function(id){
            $.ajax(
                {
                    url:"{{route('word.checkstate')}}",
                    method:"POSt",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{id:id},
                    dataType:"json",
                    success:function(data)
                    {
                        //alert(data.state);
                        let ico=$('#state_'+id);
                        if(data.state){
                            ico.removeClass('text-danger fa-times').addClass('text-success fa-check');
                        }
                        else if(!data.state)
                        {
                            ico.removeClass('text-success fa-check').addClass('text-danger fa-times');
                        }
                    },
                    error:function () {
                        alert("error");
                    }
                });
        };

        getInformationWord=function(id){
            $.ajax(
                {
                    url:"{{ route('study.get.information.word') }}",
                    method:"POSt",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{id:id},
                    dataType:"json",
                    success:function(data)
                    {
                        let english=data.word['english'];
                        let persians=data.word['persians'];
                        let sentences=data.word['sentence'];
                        $('#english_text_modal').text(english);
                        $('#persian_text_modal').text(null);
                        for (i = 0; i < persians.length; i++){
                            $('#persian_text_modal').append("<span class='text-muted'>"+persians[i]+"</span>");
                        }

                        $('#sentences_text_modal').text(null);
                        for (i = 0; i < sentences.length; i++){
                            $('#sentences_text_modal').append("<li class='text-muted'>"+sentences[i]+"</li>");
                        }
                    }
                });
        };

    </script>
    <script>
        $(document).ready(function () {
            $('#thWord').click(function () {
                $('#iconWord').toggleClass('fa-align-center');
                $('#iconWord').toggleClass('fa-align-left');
                $('.td-word').each(function () {
                    $(this).toggleClass('text-center');
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            //visible/hidden persiansWord
            $("#visiblePersian").click(function() {
                $('#iconVisiblePersian').toggleClass('fa-eye-slash');
                $('#iconVisiblePersian').toggleClass('fa-eye');
                $('.persian').each(function(){
                    $(this).toggleClass('hide');
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            //visible/hidden persiansWord
            $("#thNumber").click(function() {
                $('#iconNumber').toggleClass('fa-circle');
                $('#iconNumber').toggleClass('fa-circle-o');
                $('.number').each(function(){
                    $(this).toggleClass('hide');
                });
            });
        });
    </script>
    <!-- yajra datatable -->
    <script src="{{ url('js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $(function(){
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route($route) }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'word', name: 'word' },
                        { data: 'persian', name: 'persian' },
                        { data: 'setting', name: 'setting' }
                    ]
                });
            });
        });
    </script>
    <!-- yajra datatable -->
@endsection

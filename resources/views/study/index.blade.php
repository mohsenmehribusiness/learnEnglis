@extends('layouts.master')

@section('content')
    @include('study.moreSetting')
    <table class="table" id="studyTable">
        <thead>
        <tr>
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
                <input class="form-check-input m-1 p-1 position-static" style="opacity:0.1;" type="checkbox" id="settingth" checked>
                <label for="settingth" id="settingthlabel" class="label text-muted">Setting</label>
            </th>
        </tr>
        </thead>
    </table>
    <!-- modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content px-3 py-4" style="background-color:#fffdd0;">
                <h4 class="font-weight-bold">
                    word :
                    <span class="text-justify"  id="english_text_modal"></span>
                </h4>
                <div class="float-right">
                    persian :
                    <h6 class="float-right" >
                        <span id="persian_text_modal"></span>
                    </h6>
                </div>
                <div class="float-right">
                    sentences :
                    <h6 class="float-right">
                        <ol class="px-4 py-4" id="sentences_text_modal">
                        </ol>
                    </h6>
                </div>
                <br>
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
    <!-- get information word -->
    <script>
        getInformationWord=function(id){
            $.ajax(
                {
                    url:"{{ route('word.get.information') }}",
                    method:"POSt",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{id:id},
                    dataType:"json",
                    success:function(data)
                    {
                        let english=data['english'];
                        $('#english_text_modal').text(english);
                        let persians=data['persians'];
                        let sentences=data['sentences'];
                        $('#persian_text_modal').text(null);
                        for (i = 0; i < persians.length; i++){
                            $('#persian_text_modal').append("<span class='text-muted'>"+persians[i]+"</span><br>");
                        }
                        $('#sentences_text_modal').text(null);
                        for (i = 0; i < sentences.length; i++){
                            $('#sentences_text_modal').append("<li class='text-muted'>"+sentences[i]+"</li>");
                        }
                    },
                    error:function(){
                        alert("error");
                    }
                });
        };
    </script>
    <!-- get information word -->
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
                    ajax: '{{ route("study.data") }}',
                    columns: [
                        { data: 'word', name: 'word' },
                        { data: 'persian', name: 'persian' ,orderable:false,searchable:false},
                        { data: 'setting', name: 'setting',orderable:false,searchable:false },
                    ]
                });
            });
        });
    </script>
    <!-- yajra datatable -->
    <!-- state request ajax -->
    <script>
        checkstate=function(id){
            $.ajax(
                {
                    url:"{{route('word.state.check.ajax')}}",
                    method:"POST",
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
                            //ico.removeClass('text-danger fa-times').addClass('text-success fa-check');
                            ico.removeClass('text-danger fa-frown-o').addClass('text-success fa-smile-o');
                        }
                        else if(!data.state)
                        {
                            //ico.removeClass('text-success fa-check').addClass('text-danger fa-times');
                            ico.removeClass('text-success fa-smile-o').addClass('text-danger fa-frown-o');
                        }
                    },
                    error:function () {
                        alert("error");
                    }
                });
        };
    </script>
    <!-- state request ajax -->
@endsection

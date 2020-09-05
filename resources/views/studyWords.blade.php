@extends('layouts.master')
@section('content')
    <div id="moreSetting" class="collapse">
        <div class="row">
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input position-static" type="checkbox" name="tableBorder" id="tableBorder" >
                    <label for="tableBorder" class="label">table border</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">

                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input position-static" type="checkbox" name="tableHover" id="tableHover" >
                    <label for="tableHover" class="label">table hover</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row float-right">
        <!-- more .. -->
        <a href="#moreSetting" data-toggle="collapse" class="text-muted">setting</a>
    </div>
    <table id="studyTable" class="table">
        <thead>
        <tr>
            <th>Numbers</th>
            <th scope="col">English</th>
            <th scope="col">
                <input class="form-check-input m-1 p-1 position-static" type="checkbox" checked id="visiblePersian" >
                <label for="visiblePersian" class="label">persian</label>
            </th>
            <th>
                setting
            </th>
        </tr>
        </thead>
        <tbody>
            @php $i=(int) 1; @endphp
            @foreach($words as $word)
                <tr>
                    <th scope="row">
                        {{ $loop->index+1 }}
                    </th>
                    <td>
                        {{ $word->english }}
                    </td>
                    <td>
                       @foreach($word->persian as $persian)
                        <span class="persian">
                            {{ $persian }}
                            @if(!$loop->last)
                                ,
                            @endif
                        </span>
                        @endforeach
                    </td>
                    <td>
                        <a  onclick="checkstate({{ $word->id }})" class="px-1 cursor_pointer " >
                            <i id="state_{{$word->id}}" class="fa {{ $word->state ? 'fa-check text-success' : 'fa-times text-danger' }}" aria-hidden="true"></i>
                        </a>
                        <a onclick="getInformationWord({{ $word->id }})" class="px-1 cursor_pointer" data-toggle="modal" data-target=".bd-example-modal-lg">
                            <i class="fa fa-info-circle text-info" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                @php $i++ @endphp
            @endforeach
        </tbody>
    </table>
    <!-- modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content px-3 py-4" style="background-color:#fffdd0;">
                hi and welcome
            </div>
        </div>
    </div>
   <!-- modal -->
    {{ $words->links() }}
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .colorstate{
            color:red;
        }
        label {
            cursor: pointer;
        }
        .hide{
            visibility:hidden !important;
        }
    </style>
@endsection

@section('script')
    <script src = "{{ url('js/jqueryAjax.min.js') }}"></script>
    <script>
        checkstate=function(id){
            $.ajax(
                {
                    url:"{{ route('checkstate') }}",
                    method:"POSt",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{id:id},
                    dataType:"json",
                    success:function(data)
                    {
                        let ico=$('#state_'+id);
                        ico.toggleClass('fa-check');
                        ico.toggleClass('fa-times');
                        if(data.state){
                            ico.addClass('text-success');
                            ico.removeClass('text-danger');
                        }
                        else
                        {
                            ico.removeClass('text-success');
                            ico.addClass('text-danger');
                        }
                    }
                });
        };
        getInformationWord=function(id){
            $.ajax(
                {
                    url:"{{ route('get.information.word') }}",
                    method:"POSt",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{id:id},
                    dataType:"json",
                    success:function(data)
                    {
                        let english=data.word['english'];
                        let persian=data.word['persian'];
                        alert(persian);
                    }
                });
        }


        $(document).ready(function () {
            //table border
            $("#tableBorder").change(function() {
                $('#studyTable').toggleClass('table-bordered');
            });

            //table hover
            $("#tableHover").change(function() {
                $('#studyTable').toggleClass('table-hover');
            });

            //visible/hidden persiansWord
            $("#visiblePersian").change(function() {
                $('.persian').each(function(){
                    $(this).toggleClass('hide');
                });
            });
        });
    </script>
@endsection

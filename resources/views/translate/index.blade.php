@extends('layouts.master')

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-12">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <span id="source">english</span>
                            <a class="float-right" href=""><i class="fa fa-exchange"></i></a>
                        </div>
                        <div class="col">
                            <span id="target">persian</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col text-center border-right .col-text-area-left" >
                    <textarea class="form-control" id="original" placeholder="Enter Your Text" ></textarea>
            </div>
            <div class="col text-center border-left col-text-area-right" >
                    <textarea style="direction: rtl !important;" class="form-control" id="translated" placeholder="Translated text will be here" ></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
                <span class="text-muted">
                    press enter for translate
                </span>
        </div>
    </div>
@endsection

@section('script')
<script src = "{{ url('js/jqueryAjax.min.js') }}"></script>
<script>
    let source,target;
    source=$('#source').text();
    target=$('#target').text();
    $(document).ready(function(){
            $( "#original" ).keypress(function(e){
                if(e.which == 13) {
                    //code ajax here
                    let text=$(this).val();
                    $.ajax(
                        {
                            url:"{{ route('translate.ajax') }}",
                            method:"POSt",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data:{source:source,target:target,'text':text},
                            dataType:"json",
                            success:function(data)
                            {
                                //console.log(data.translate);
                                $('#translated').val(data.translate);
                            }
                        });
                }
        });
    });
</script>
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        textarea {
            box-sizing:border-box;
            border:0px !important;
            min-height:200px;
            resize: none;
        }
        .col-text-area-left {
            min-height:200px;
            padding-right:0px !important;
        }
        .col-text-area-right {
            min-height:200px;
            padding-left:0px !important
        }
    </style>
@endsection

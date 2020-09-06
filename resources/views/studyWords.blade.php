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
                    <input class="form-check-input position-static" type="checkbox" name="tableHover" id="tableHover" >
                    <label for="tableHover" class="label">table hover</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check">
                    <input class="form-check-input position-static" type="checkbox" name="tableHoverPersian" id="tableHoverPersian" >
                    <label for="tableHoverPersian" class="label">table hover persian</label>
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
            <th>Number</th>
            <th scope="col" class="text-center">English</th>
            <th scope="col">
                <input class="form-check-input m-1 p-1 position-static" type="checkbox" checked id="visiblePersian" >
                <label for="visiblePersian" class="label">Persian</label>
            </th>
            <th class="text-center">
                <input class="form-check-input m-1 p-1 position-static" style="opacity:0.1;" type="checkbox" id="settingth" >
                <label for="settingth" id="settingthlabel" class="label text-muted">Setting</label>
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
                    <td class="text-center">
                        {{ $word->english }}
                    </td>
                    <td class="persian-td">
                        <span class="persian">
                       @foreach($word->persian as $persian)
                        <span>
                            {{ $persian }}
                            @if(!$loop->last)
                                ,
                            @endif
                        </span>
                        @endforeach
                        </span>
                    </td>
                    <td class="settingtd text-center" style="visibility:hidden;">
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
    {{ $words->links() }}
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('css/study.css') }}">
@endsection

@section('script')
    <script src = "{{ url('js/jqueryAjax.min.js') }}"></script>
    <script src = "{{ url('js/study.js') }}"></script>
@endsection

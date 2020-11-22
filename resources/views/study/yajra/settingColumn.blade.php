<div class="btn-group setting">
<a onclick="getInformationWord({{ $word->id }})" class="btn btn-sm btn-outline-info border cursor_pointer" data-toggle="modal" data-target=".bd-example-modal-lg">
    info
</a>
@if(isset($word->Detail->state))
    <a  onclick="checkstate({{ $word->id }})" class="btn btn-sm border-top border-bottom" >
        <i style="font-size:140%!important;" id="state_{{$word->id}}" class="fa {{  $word->Detail->state ? 'fa-smile-o text-success' : 'fa-frown-o text-danger' }}" aria-hidden="true"></i>
    </a>
@endif
<a href='{{route("insert.$choose.edit.get",["word"=>$word])}}' class="btn btn-sm btn-outline-warning">
    edit
</a>
</div>
{{--  fa fa-smil-o --}}
{{--<span class="setting">
    @if(isset($word->Detail->state))
        <a  onclick="checkstate({{ $word->id }})" class="px-1 cursor_pointer " >
        <i id="state_{{$word->id}}" class="fa {{  $word->Detail->state ? 'fa-check text-success' : 'fa-times text-danger' }}" aria-hidden="true"></i>
        </a>
    @endif
<a onclick="getInformationWord({{ $word->id }})" class="px-1 cursor_pointer" data-toggle="modal" data-target=".bd-example-modal-lg">
    <i class="fa fa-info-circle text-info" aria-hidden="true"></i>
</a>
<a href='{{route("insert.$choose.edit.get",["word"=>$word])}}' class="px-1 cursor_pointer">
    <i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i>
</a>
</span>--}}

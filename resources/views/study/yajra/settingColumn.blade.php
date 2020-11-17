<span class="setting">
    <a  onclick="checkstate({{ $word->id }})" class="px-1 cursor_pointer " >
    <i id="state_{{$word->id}}" class="fa {{ $word->Detail->state ? 'fa-check text-success' : 'fa-times text-danger' }}" aria-hidden="true"></i>
</a>
<a onclick="getInformationWord({{ $word->id }})" class="px-1 cursor_pointer" data-toggle="modal" data-target=".bd-example-modal-lg">
    <i class="fa fa-info-circle text-info" aria-hidden="true"></i>
</a>
<a href='{{route("insert.$choose.edit.get",['word'=>$word])}}' class="px-1 cursor_pointer">
    <i class="fa fa-pencil-square-o text-warning" aria-hidden="true"></i>
</a>
</span>

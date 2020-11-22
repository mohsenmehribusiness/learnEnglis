<span class="persian" id="{{$word->id}}_persianSpan" data-hoverPersian="false" >
    @foreach($word->persians()->get() as $persian)
        <span>
            {{ $persian->persian }}
            @if(!$loop->last)
            ,
            @endif
        </span>
    @endforeach
</span>

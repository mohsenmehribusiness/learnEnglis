<span class="persian">
    @foreach($word->persians()->get() as $persian)
        <span>
            {{ $persian->persian }}

            @if(!$loop->last)
            ,
            @endif
        </span>
    @endforeach
</span>

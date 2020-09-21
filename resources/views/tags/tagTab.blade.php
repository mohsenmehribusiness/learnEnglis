@foreach($letters as $key=>$value)
    <a href="">
        <h4 class="text-danger">
            {{ $key }}
         </h4>
    </a>
    <div class="row">
        <div class="col">
            <div class="text-justify pl-5">
                @php $nameFunction=ucfirst($general).'StartLetter';  @endphp
                @foreach($objects->$nameFunction($value)->get() as $object)
                    <a href="{{ route("{$general}.{$general}",["{$general}"=>$object->$general]) }}">
                       <span class="pl-1">
                                {{ $object->$general }}
                        </span>
                    </a>
                    @if(!$loop->last)
                        <span class="">,</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <hr style="margin-right:70% !important;">
    <br>
@endforeach

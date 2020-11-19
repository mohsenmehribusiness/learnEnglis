{{--
<a href="{{ route("{$key}.index")}}"><h5>{{ $title }}</h5></a>
<ul class="list-unstyled text-small">
    @foreach($objects as $lesson)
        <li><a class="text-muted" href="{{ route("{$key}.{$key}",["{$key}"=>$lesson->$key]) }}">
                {{$lesson->$key}}
            </a>
        </li>
    @endforeach
</ul>
--}}

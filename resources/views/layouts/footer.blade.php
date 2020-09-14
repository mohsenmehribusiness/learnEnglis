<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <img class="mb-2" src="{{ url('images/logo_504.png') }}" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2020-2021</small>
        </div>
        <div class="col-6 col-md">
            <h5>Lessons</h5>
            <ul class="list-unstyled text-small">
                @php $lessons=\App\Lesson::select('lesson','id')->take(6)->get();   @endphp
                @foreach($lessons as $lesson)
                    <li><a class="text-muted" href="{{ route('lesson.lesson',['id'=>$lesson->id]) }}">
                        {{$lesson->lesson}}
                        </a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6 col-md">
            <a href="{{ route('tag.index')}}"><h5>Tags</h5></a>
            <ul class="list-unstyled text-small">
                @php $tags=\App\Tag::select('tag')->take(6)->get();   @endphp
                @foreach($tags as $tag)
                    <li><a class="text-muted" href="{{ route('tag.tag',['tag'=>$tag->tag]) }}">
                            {{$tag->tag}}
                        </a></li>
                @endforeach
            </ul>
        </div>
        <div class="col-6 col-md">
            <h5>About</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="#">Team</a></li>
                <li><a class="text-muted" href="#">Locations</a></li>
                <li><a class="text-muted" href="#">Privacy</a></li>
                <li><a class="text-muted" href="#">Terms</a></li>
            </ul>
        </div>
    </div>
</footer>

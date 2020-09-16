<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-12 col-md">
            <img class="mb-2" src="{{ url('images/logo_504.png') }}" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2020-2021</small>
            <h6 class="text-muted">author</h6>
            <span class="pl-3 text-muted">
                <li class="fa fa-user-circle-o"></li>
                mohsen mehri</span>
        </div>
        <div class="col-6 col-md">
            <a href="{{ route('lesson.index')}}"><h5>Lessons</h5></a>
            <ul class="list-unstyled text-small">
                @php $lessons=\App\Lesson::select('lesson')->take(6)->get();   @endphp
                @foreach($lessons as $lesson)
                    <li><a class="text-muted" href="{{ route('lesson.lesson',['lesson'=>$lesson->lesson]) }}">
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
            <a href="{{ route('tag.index')}}"><h5>RandomWord</h5></a>
            <ul class="list-unstyled text-small">
                @php $words=\App\Word::all()->random(6);   @endphp
                @foreach($words as $word)
                    <li><a class="text-muted" href="{{ route('word.word',['word'=>$word->english]) }}">
                            {{$word->english}}
                        </a></li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>

<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <a href="{{ route('word.index') }}">
                <h6 class="my-0">Word,s</h6>
            </a>
        </div>
        <span class="text-muted">{{ $details['wordCount'] }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <a href="{{ route('sentence.index') }}">
                <h6 class="my-0">Sentences</h6>
            </a>
        </div>
        <span class="text-muted">{{ $details['sentenceCount'] }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <a href="{{ route('tag.index') }}">
                <h6 class="my-0">Tags</h6>
            </a>
        </div>
        <span class="text-muted">{{ $details['tags']  }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <a href="{{ route('lesson.index') }}">
                <h6 class="my-0">Lessons</h6>
            </a>
        </div>
        <span class="text-muted">{{ $details['lessons']  }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
            <h6 class="my-0">RepeatAll</h6>
        </div>
        <span class="text-success">{{ $details['repeat'] }}</span>
    </li>
    {{--<li class="list-group-item d-flex justify-content-between">
        <span>جمع (تومان)</span>
        <strong>$20</strong>
    </li>--}}
</ul>
<ul class="list-group mb-3">

    <li class="list-group-item border-white">
        <span class="text-primary">insert</span>
        <br>
        <a class="text-primary cursor_pointer pl-5" id="insert_lesson" data-toggle="modal" data-target="#insert_lesson_modal"> Lesson</a>
        <br>
        <a class="text-primary cursor_pointer pl-5" href="{{ route('insert.multi.word') }}"> MultiWord</a>
        <br>
        <a class="text-primary cursor_pointer pl-5" href="{{ route('insert.multi.sentence') }}"> MultiSentence</a>
    </li>
</ul>
<!-- Trigger the modal with a button -->

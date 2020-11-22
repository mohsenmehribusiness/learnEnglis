<ul class="list-group mb-3">
    @foreach($details as $key=>[$count,$icon,$link])
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <a href="{{ route('word.index') }}">
                <h6 class="my-0">{{ $key }}</h6>
            </a>
        </div>
        <span class="text-muted">{{ $count }}</span>
    </li>
    @endforeach
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
        <br>
        <a class="text-primary cursor_pointer pl-5" href="{{ route('insert.qa.get') }}"> Question Answer</a>
    </li>
</ul>
<!-- Trigger the modal with a button -->

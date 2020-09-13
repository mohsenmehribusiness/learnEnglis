{{--<h4 class="d-flex justify-content-between align-items-center mb-3">
     <span class="text-muted">سبدخرید شما</span>
     <span class="badge badge-secondary badge-pill">3</span>
 </h4>--}}
<ul class="list-group mb-3">
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0">Word,s</h6>
        </div>
        <span class="text-muted">{{ $details['wordCount'] }}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
            <h6 class="my-0">Sentences</h6>
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
            <h6 class="my-0">Lessons</h6>
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
        <a class="text-primary cursor_pointer" id="insert_lesson" data-toggle="modal" data-target="#insert_lesson_modal">Insert Lesson</a>
    </li>
</ul>
<!-- Trigger the modal with a button -->

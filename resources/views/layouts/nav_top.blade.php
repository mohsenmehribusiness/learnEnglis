<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a href="{{ route('home') }}"><img src="{{ url('images/logo_504.png') }}" class="box-shadow rounded-circle" style="width:37px;height: auto;" alt="">
        </a>
    </h5>
    <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="text-muted  nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lessons</a>
            <div class="dropdown-menu">
                @foreach($lessons as $lesson)
                    <a class="dropdown-item"
                       href="{{ route("lesson.lesson",["lesson"=>$lesson->lesson]) }}">
                        {{$lesson->lesson}}</a>
                @endforeach
            </div>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('exam.index') }}">Exam</a>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('sentence.index') }}">Sentences</a>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('qa.index') }}">Qa</a>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('word.index') }}">Words</a>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('tag.index') }}">Tags</a>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('lesson.index') }}">Lessons</a>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('translate.index') }}">Translate</a>
        </li>
        <li class="nav-item">
            <a class="text-muted  nav-link" href="{{ route('insert') }}">Insert</a>
        </li>
    </ul>
</div>

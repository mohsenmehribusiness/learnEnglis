<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a href="{{ route('home') }}"><img src="{{ url('images/logo_504.png') }}" class="box-shadow rounded-circle" style="width:37px;height: auto;" alt="">
        </a>
    </h5>
    <ul class="nav nav-pills">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lessons</a>
            <div class="dropdown-menu">
                {{--<a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>--}}
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Exam</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('study') }}">Study</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('translate') }}">Translate</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('insert.word') }}">InsertWord</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li>
    </ul>
</div>

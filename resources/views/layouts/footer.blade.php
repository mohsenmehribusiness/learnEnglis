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
            @include('layouts.sectionFooter',['title'=>'Lessons','key'=>'lesson','objects'=>\App\Lesson::select('lesson')->take(6)->get()])
        </div>
        <div class="col-6 col-md">
                @include('layouts.sectionFooter',['title'=>'Tags','key'=>'tag','objects'=>\App\Tag::select('tag')->take(6)->get()])
        </div>
        <div class="col-6 col-md">
            @include('layouts.sectionFooter',['title'=>'Words','key'=>'word','objects'=>$words=\App\Word::all()->random(6)])
        </div>
    </div>
</footer>

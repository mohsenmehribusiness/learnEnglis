<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
        <div class="col-6 col-md">
            @include('layouts.sectionFooter',['title'=>'Lessons','key'=>'lesson','objects'=>$lessons])
        </div>
        <div class="col-6 col-md ">
                @include('layouts.sectionFooter',['title'=>'Tags','key'=>'tag','objects'=>$tags])
        </div>
        <div class="col-6 col-md ">
            @include('layouts.sectionFooter',['title'=>'Words','key'=>'word','objects'=>$wordsFooter])
        </div>
        <div class="col-12 col-md border-left">
            <img class="mb-2" src="{{ url('images/logo_504.png') }}" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; 2020-2021</small>
            <h6 class="text-muted">author</h6>
            <span class="pl-3 text-muted">
                <li class="fa text-success fa-user-circle-o"></li>
                <label class="cursor_pointer">mohsen mehri</label></span>
        </div>
    </div>
</footer>

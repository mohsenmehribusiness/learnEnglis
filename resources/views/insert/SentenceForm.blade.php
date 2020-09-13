<form class="needs-validation pt-5 pb-5" action="{{ route('insert.sentence')}}" method="POST" novalidate>
    @csrf
    <div class="mb-3">
        <input type="text" class="form-control" id="tag" name="sentence" placeholder="insert sentence..." required>
        <div class="invalid-feedback">
            لطفا آدرس خود را وارد کنید
        </div>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="persian" name="persian" placeholder="persian..." required>
        <div class="invalid-feedback">
            لطفا آدرس خود را وارد کنید
        </div>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="tag" name="tag" placeholder="tags..." required>
        <div class="invalid-feedback">
            لطفا آدرس خود را وارد کنید
        </div>
    </div>
    <!-- more .. -->
    <div id="demo" class="collapse">
        <div class="mb-3">
            @include('insert.lessonSelect')
        </div>
    </div>
    <a href="#demo" data-toggle="collapse" class="link float-right">more</a>
    <br>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Insert</button>
</form>

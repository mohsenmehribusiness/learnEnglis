<form class="@error('english') was-validated @enderror @error('persian') was-validated @enderror pt-5 pb-5" action="{{ route('insert.word')}}" method="POST" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <input type="text" class="form-control" id="english" name="english" placeholder="english" value="" required>
            @error('english')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="persian" name="persian" placeholder="persian words..." required>
        @error('persian')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <input type="text" class="form-control" id="tag" name="tag" placeholder="tags..." >
    </div>
    <!-- more .. -->
    <div id="demo" class="collapse">
        <div class="mb-3">
            <input type="text" class="form-control" name="sentence" id="sentence" placeholder="sentence" >
        </div>
        <div class="mb-3">
            @include('insert.lessonSelect')
        </div>
    </div>
    <a href="#demo" data-toggle="collapse" class="link float-right">more</a>
    <br>
    <hr class="mb-4">
    <button class="btn btn-primary btn-lg btn-block" type="submit">Insert</button>
</form>

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
            <h6 class="my-0">Tags</h6>
        </div>
        <span class="text-muted">{{ $details['tags']  }}</span>
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
        <a class="text-primary cursor_pointer" data-toggle="modal" data-target="#insert_lesson">Insert Lesson</a>
    </li>
</ul>
<!-- Trigger the modal with a button -->

<!-- Modal -->
<div class="modal fade" id="insert_lesson" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <span>insert you,r lesson ...</span>
                <form class="needs-validation p-5" action="{{ route('insert.lesson')}}" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" id="lesson" name="lesson" placeholder="lesson" value="" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                    </div>
                    <button class="btn btn-outline-success  btn-block" type="submit">insert lesson</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{--<form class="card p-2">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="کد تخفیف">
        <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">اعمال</button>
        </div>
    </div>
</form>--}}

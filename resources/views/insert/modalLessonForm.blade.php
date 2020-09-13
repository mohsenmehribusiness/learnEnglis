<!-- Modal -->
<div class="modal fade" id="insert_lesson_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <span>insert you,r lesson ...</span>
                <form class="@error('lesson') was-validated @enderror  p-5" action="{{ route('insert.lesson')}}" method="POST" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" id="lesson" name="lesson" placeholder="lesson" value="" required>
                            @error('lesson')
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="description" name="description" placeholder="description" required>
                        @error('description')
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-outline-success  btn-block" type="submit">insert lesson</button>
                </form>
            </div>
        </div>
    </div>
</div>

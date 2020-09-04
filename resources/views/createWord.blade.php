@extends('layouts.master')

@section('content')
    <div class="row mt-5">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">سبدخرید شما</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">عنوان عنوان محصول</h6>
                        <small class="text-muted">توضیح مختصر</small>
                    </div>
                    <span class="text-muted">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">عنوان محصول دوم</h6>
                        <small class="text-muted">توضیح مختصر</small>
                    </div>
                    <span class="text-muted">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">آیتم سوم</h6>
                        <small class="text-muted">توضیح مختصر</small>
                    </div>
                    <span class="text-muted">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">کد تخفیف</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success">-$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>جمع (تومان)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="کد تخفیف">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">اعمال</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 order-md-1">
            <h4>Insert Words ... </h4>
            <hr>
            <br>
            <form class="needs-validation" action="{{ route('insert.word')}}" method="POST" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <input type="text" class="form-control" id="english" name="english" placeholder="english" value="" required>
                        <div class="invalid-feedback">
                            لطفا نام را وارد کنید.
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="persian" name="persian" placeholder="persian words..." required>
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
                        <input type="text" class="form-control" id="lesson" name="lesson" placeholder="lesson" required>
                        <div class="invalid-feedback">
                            لطفا آدرس خود را وارد کنید
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="sentence" id="sentence" placeholder="sentence" required>
                        <div class="invalid-feedback">
                            لطفا آدرس خود را وارد کنید
                        </div>
                    </div>
                </div>
                <a href="#demo" data-toggle="collapse" class="link float-right">more</a>
                <br>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Insert</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.master')

@section('content')
    <div class="row mt-5">
        <div class="col-md-4 order-md-2 mb-4">
            @include('insert.side')
        </div>
        <div class="col-md-8 order-md-1">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#word_nav" role="tab" aria-controls="home" aria-selected="true">Word</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#sentence_nav" role="tab" aria-controls="profile" aria-selected="false">Sentence</a>
                </li>
            </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="word_nav" role="tabpanel" aria-labelledby="home-tab">
                        <form class="needs-validation pt-5 pb-5" action="{{ route('insert.word')}}" method="POST" novalidate>
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
                    <div class="tab-pane fade" id="sentence_nav" role="tabpanel" aria-labelledby="profile-tab">
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
                                    <input type="text" class="form-control" id="lesson" name="lesson" placeholder="lesson" required>
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
            </div>
    </div>
@endsection

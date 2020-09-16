<div id="moreSetting" class="collapse">
    <div class="row pb-3">
        <div class="col">
            <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" name="tableBorder" id="tableBorder" >
                <label for="tableBorder" class="label">table border</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" name="tableHover" id="tableHover" >
                <label for="tableHover" class="label">table hover</label>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <input class="form-check-input position-static" type="checkbox" name="tableHoverPersian" id="tableHoverPersian" >
                <label for="tableHoverPersian" class="label">table hover persian</label>
            </div>
        </div>
    </div>
</div>
<div id="moreChoose" class="collapse border-top">
    <div class="row pt-3">
        <div class="col">
            <div class="form-check">

                <a class="text-muted" href="{{ route('study.oldest') }}">
                    <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route('study.oldest')])"></i>
                    Oldest</a>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <a class="text-muted" href="{{ route('study.newest') }}">
                    <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route('study.newest')])"></i>
                    Newest</a>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <a class="text-muted" href="{{ route('study.state.false') }}">
                    <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route('study.state.false')])"></i>
                    State
                    <i class="fa fa fa-times"></i>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="form-check">
                <a class="text-muted" href="{{ route('study.state.true') }}">
                    <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route('study.state.true')])"></i>
                    State
                    <i class="fa fa fa-check"></i>
                </a>
            </div>
        </div>

    </div>
</div>
<div class="row float-right">
    <!-- more .. -->
    <a href="#moreChoose" data-toggle="collapse" class="text-muted px-3">Choose</a>
    <a href="#moreSetting" data-toggle="collapse" class="text-muted px-3">setting</a>
</div>

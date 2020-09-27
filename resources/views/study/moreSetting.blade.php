<div class="row">
    <div class="col">
        <!-- more .. -->
        <a href="#moreSetting" data-toggle="collapse" class="text-muted px-3">
            <i class="fa fa-cogs"></i>
        </a>
        <a href="#moreChoose" data-toggle="collapse" class="text-muted px-3">
            <i class="fa fa-filter"></i>
        </a>
    </div>
</div>
<br>
<div class="row text-center">
    <div class="col">
        <div id="moreSetting" style="font-size:0.9rem;"  class="collapse">
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <input class="hide form-check-input position-static" type="checkbox" name="tableBorder" id="tableBorder" >
                        <label id="labelTableBorder" for="tableBorder" class="border-top px-1 pb-1 label">border</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="hide form-check-input position-static" type="checkbox" name="tableHover" id="tableHover" >
                        <label id="labelTableHover" for="tableHover" class="border-top label">hover</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <input class="hide form-check-input position-static" type="checkbox" name="tableHoverPersian" id="tableHoverPersian" >
                        <label id="labelTableHoverPersian" for="tableHoverPersian" class="border-top label">hover persian</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div id="moreChoose" style="font-size:0.9rem;"  class="collapse">
            <div class="row">
                <div class="col">
                    <div class="form-check">
                        <a class="text-muted border-top" href="{{ route($routes["old"]) }}">
                            <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route($routes["old"])])"></i>
                            Oldest</a>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <a class="text-muted border-top" href="{{ route($routes["new"]) }}">
                            <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route($routes["new"])])"></i>
                            Newest</a>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <a class="text-muted border-top" href="{{ route($routes["stateTimes"]) }}">
                            <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route($routes["stateTimes"])])"></i>
                            State
                            <i class="fa fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                        <a class="text-muted border-top" href="{{ route($routes["stateCheck"]) }}">
                            <i class="fa  @include('study.checkUrlAddFaIcon',['url'=>route($routes["stateCheck"])])"></i>
                            State
                            <i class="fa fa fa-check"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<br>

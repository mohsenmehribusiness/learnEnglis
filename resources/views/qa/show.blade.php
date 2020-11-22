@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col">
            <a id="before" class="px-2 border-right text-info cursor_pointer"><i class="fa fa-arrow-left"></i></a>
            <a id="next" data-value="1" class="px-2 border-left text-info cursor_pointer"><i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="col">
            @include('qa.layouts.selectorQa')
        </div>
    </div>
    <input type="number" style="visibility:hidden!important;" value="{{ $qa->id }}" id="id">
    <div class="row text-center mt-5">
        <div class="col"><span id="title">{{ $qa->title }}</span></div>
    </div>
    <div class="row p-5 text-center">
        <div class="col border-right">
            <div id="questionColumn" class="d-flex flex-column">
                @foreach($qa->getQuestions() as $question)
                    <div class="alert alert-success">
                        {{ $question }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col border-left">
            <div id="answerColumn" class="d-flex flex-column">
                @foreach($qa->getAnswers() as $answers)
                    <div class="alert alert-success">
                        {{ $answers }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col pt-5 border-top">
            <span id="description">
                {{ $qa->description }}
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <span>lessons : </span>
            <span id="lessons">
                @foreach($qa->lessons()->get() as $lesson)
                    <span class="text-muted">{{ $lesson->lesson }}</span>
                @endforeach
            </span>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <span>tags : </span>
            <span id="tags">
                @foreach($qa->tags()->get() as $tag)
                    <span class="text-muted mx-1">{{ $tag->tag }}</span>
                @endforeach
            </span>
        </div>
    </div>
@endsection

@section('script')
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('js/bootstrap-select.min.js') }}"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script>
        @error('lesson')
        $('#insert_lesson_modal').modal('show');
        @enderror
        $('.my-select').selectpicker({dropupAuto: false});
    </script>
    <script src = "{{ url('js/jqueryAjax.min.js') }}"></script>
    <script>
        let idMax={{ $idMax }};
        $(document).ready(function(){
            $('#next').click(function(){
                let id=parseInt($('#id').val());
                $('#before').removeClass('cursor_no_drop text-muted');
                $('#before').addClass('cursor_pointer text-info');
                if(id==idMax) {
                    $(this).addClass('cursor_no_drop text-muted');
                    $(this).removeClass('cursor_pointer text-info');
                    return null;
                }
                id++;
                getInfoQa(id);
            });
            $('#before').click(function(){
                let id=parseInt($('#id').val());
                id--;
                $('#next').removeClass('cursor_no_drop text-muted');
                $('#next').addClass('cursor_pointer text-info');
                if(id==0) {
                    $(this).addClass('cursor_no_drop text-muted');
                    $(this).removeClass('cursor_pointer text-info');
                    return null;
                }
                getInfoQa(id);
            });
            $('#selectQa').change(function () {
                getInfoQa($(this).val());
            });
            function checkButtonBeforeOrNext() {
                let id=parseInt($('#id').val());
                /*if(id==idMax)
                {
                    $('#next').addClass('text-muted')
                }
                if(id==1)
                {
                    $('#before').addClass('text-muted');
                }*/

            }
            function getInfoQa(id){
                //show icon wait
                $.ajax(
                    {
                        url:'{{route("qa.get.info")}}',
                        method:"POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:{id:id},
                        dataType:"json",
                        success:function(data){
                            //set id
                            $('#id').val(data['id']);
                            //set description
                            $('#description').text(data['description']);
                            //set title
                            $('#title').text(data['title']);
                            //set lessons
                            $('#lessons').html(getListInSpan(data['lessons']));
                            //set tags
                            $('#tags').html(getListInSpan(data['tags']));
                            //set questions
                            $('#questionColumn').html(getListInAlert(data['questions']));
                            //set answers
                            $('#answerColumn').html(getListInAlert(data['answers']));
                        },
                        error:function (){
                            alert('somethings error...');
                        }
                    });
                checkButtonBeforeOrNext();
            }
            function getListInSpan(objects){
                let globalHtml='<span class="text-muted mx-1">';
                globalHtml=globalHtml+objects.join('</span><span class="text-muted mx-1">');
                globalHtml=globalHtml+'</span>';
                return globalHtml;
            }
            function getListInAlert(objects){
                let globalHtml='<div class="alert alert-success">';
                globalHtml=globalHtml+objects.join('</div><div class="alert alert-success">');
                globalHtml=globalHtml+'</div>';
                return globalHtml;
            }
        });
    </script>
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- bootstrap-multiSelect -->
    <link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
    <!-- bootstrap-multiSelect -->
@endsection

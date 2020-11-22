@extends('layouts.master')

@section('content')
    <div class="row boxxx-shadow rounded border border-success">
        <div class="col">
            <form class="pt-5 pb-5"
                  action="{{ route('insert.qa')}}" method="POST" novalidate>
                @csrf
                <div class="form-group row text-center mb-2">
                    <div class="col mx-5 px-5 ">
                        <input type="text" class="form-control required" id="title" name="title" placeholder="title" value="" required />
                     </div>
                </div>
                <div class="row text-center">
                    <div class="col mx-5 px-5">
                        <hr>
                    </div>
                </div>
                <!-- questions and answers -->
                <div class="row text-center mb-5">
                     <!-- question col -->
                    <div class="col border-right" >
                        <div class="row text-center">
                            <div class="col-12 pt-4">
                                <a class="btn btn-sm btn-outline-secondary" id="addQuestion" type="submit">
                                    <i class="fa fa-plus" style="color:grey;" aria-hidden="true"></i>
                                    Question
                                </a>
                            </div>
                            <div class="col-12" id="colQuestion"></div>
                        </div>
                    </div>
                    <!-- question col -->
                    <!-- answer col -->
                    <div class="col border-right" >
                        <div class="row text-center">
                            <div class="col-12 pt-4">
                                <a class="btn btn-sm btn-outline-secondary" id="addAnswer" type="submit">
                                    <i class="fa fa-plus" style="color:grey;" aria-hidden="true"></i>
                                    Answer
                                </a>
                            </div>
                            <div class="col-12" id="colAnswer"></div>
                        </div>
                    </div>
                </div>
                <!-- answer col -->
                <!-- questions and answers -->
                <div id="demo" class="collapse">
                    <div class="row mb-2">
                        <div class="col border-right">
                            <input type="text" class="form-control" id="tags" name="tags" placeholder="tags" value="" required>
                        </div>
                        <div class="col border-left">
                            <label for="lesson" class=" mx-4">lesson</label>
                            @include('insert.lessonSelect')
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <a href="#demo" data-toggle="collapse" class="link float-right">more</a>
                <br>
                <hr class="mb-4">
                <button class="btn btn-outline-success btn-block">Insert Question - Answer</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('js/bootstrap-select.min.js') }}"></script>
    <!-- (Optional) Latest compiled and minified JavaScript translation files -->
    <script>
        function createSentenceInputForQuestionOrAnswer(QuestionOrAnswer) {
          return   `<sentence class="row text-center my-2">
                        <a class="col-1 pt-2">
                            <span class="badge badge-pill badge-secondary ml-2 text-secondary">-</span>
                        </a>
                        <div class="col">
                            <input type="text" name="`+QuestionOrAnswer+`[]" class="form-control" placeholder="`+QuestionOrAnswer.slice(0,-1)+`">
                        </div>
                    </sentence>`;
        }
        function addInputAnswer(){
            $('#colAnswer').append(createSentenceInputForQuestionOrAnswer('answers'));
        }
        function addInputQuestion(){
            $('#colQuestion').append(createSentenceInputForQuestionOrAnswer('questions'));
        }
        $(document).ready(function(){
            //just once
            addInputQuestion();
            addInputAnswer();
            //just once
            $('#addQuestion').click(function(){
                addInputQuestion();
            });
            $('#addAnswer').click(function(){
                addInputAnswer();
            });
            <!-- for button delete question or answer -->
            $("body").on('mouseenter','sentence a',function(){
                let spanChild=$(this).children('span');
                spanChild.toggleClass('text-secondary cursor_pointer');
                spanChild.text('X');
            });
            $("body").on('mouseleave','sentence a',function(){
                let spanChild=$(this).children('span');
                spanChild.toggleClass('text-secondary cursor_pointer');
                spanChild.text('-');
            });
            $("body").on('click','sentence a',function(){
                let question=$(this).parent();
                question.remove();
            });
            <!-- for button delete question or answer -->
        });
    </script>
    <script>
        $('.my-select') .selectpicker({dropupAuto: false});
    </script>
@endsection

@section('css')
    <style>
        .boxxx-shadow{
            -webkit-box-shadow: 5px 9px 5px -6px rgba(40,167,69,1);
            -moz-box-shadow: 5px 9px 5px -6px rgba(40,167,69,1);
            box-shadow: 5px 9px 5px -6px rgba(40,167,69,1);;
        }
    </style>
    <!-- bootstrap-multiSelect -->
    <link rel="stylesheet" href="{{ url('css/bootstrap-select.min.css') }}">
    <!-- bootstrap-multiSelect -->
@endsection

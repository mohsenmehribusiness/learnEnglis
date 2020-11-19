@extends('layouts.master')

@section('content')
    <div class="row">
        <table class="table" id="studyTable">
            <thead>
            <tr>
                <th>
                    {{ $general }}
                </th>
                <th class="text-center">
                    countSentence
                </th>
                <th class="text-center">
                    countWord
                </th>
                <th class="text-center">
                    Setting
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($objects as $object)
                    <tr>
                        <td>
                            {{ $object->$general }}
                        </td>
                        <td class="text-center">
                            <a href='{{ route("$general.$general",["$general"=>$object->$general]) }}'>
                                {{ $object->sentences()->count() }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href='{{ route("$general.$general",["$general"=>$object->$general]) }}'>
                                {{ $object->words()->count() }}
                            </a>
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-warning border" href='{{ route("insert.{$general}.edit.get",["$general"=>$object]) }}' >edit</a>
                                <a class="info btn btn-sm btn-outline-info border" data-{{$general}}="{{$object->$general}}" data-general="{{$general}}" data-id="{{$object->id}}" id="insert_lesson" data-toggle="modal" data-target="#insert_lesson_modal">info</a>
                                <a class="btn btn-sm btn-outline-danger border disabled" disabled="disabled" href="">del</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <hr>
        <div class="ml-5 pl-5">
            {{ $objects->links() }}
        </div>
    </div>

    <!-- modal information -->
    <!-- Modal -->
    <div class="modal fade" id="insert_lesson_modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div id="lessonInModal" class="modal-header">
                </div>
                <div id="descriptionInModal" class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    <!-- modal information -->
@endsection

@section('script')
    <script src = "{{ url('js/jqueryAjax.min.js') }}"></script>
    <script>
        $(document).ready(function(){
           $('.info').click(function(){
               let general=$(this).data('general');
               let id=$(this).data('id');
               // hi
               if(general=='lesson')
               {
                   $.ajax(
                       {
                           url:'{{route("$general.info")}}',
                           method:"POST",
                           headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                           },
                           data:{id:id,general:general},
                           dataType:"json",
                           success:function(data) {
                               $('#lessonInModal').text(data['lesson']);
                               $('#descriptionInModal').html(data['description']);
                           },
                           error:function (){
                               console.log("error");
                           }
                       });
               }
               else if(general=='tag'){
                   $('#lessonInModal').text($(this).data('tag'));
               }
           });

        });
    </script>
@endsection

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection



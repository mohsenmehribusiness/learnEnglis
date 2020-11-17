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
            <tbody>
                @foreach($objects as $object)
                    <tr>
                        <td>
                            {{ $object->$general }}
                        </td>
                        <td class="text-center">
                            {{ $object->sentences()->count() }}
                        </td>
                        <td class="text-center">
                            {{ $object->words()->count() }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-warning border" href="">edit</a>
                                <a class="btn btn-sm btn-outline-info border" href="">info</a>
                                <a class="btn btn-sm btn-outline-danger border" href="">del</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
        <br>
        <hr>
        <div class="ml-5 pl-5">
            {{ $objects->links() }}
        </div>
    </div>
@endsection

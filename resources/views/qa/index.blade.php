@extends('layouts.master')

@section('content')
    <div class="row">
    <div class="col text-center">
        <table class="table" id="studyTable">
            <thead>
            <tr>
                <th>
                    <label id="thWord">
                        title
                    </label>
                </th>
                <th>
                    <label id="visiblePersian" class="label">
                        questionsCount
                    </label>
                </th>
                <th>
                    <label id="visiblePersian" class="label">
                        answerCount
                    </label>
                </th>
                <th>
                    <input class="form-check-input m-1 p-1 position-static" style="opacity:0.1;" type="checkbox" id="settingth" checked>
                    <label for="settingth" id="settingthlabel" class="label text-muted">Setting</label>
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($qas as $qa)
                    <tr>
                        <td>{{ $qa->title }}</td>
                        <td>{{ $qa->getQuestions()->count() }}</td>
                        <td>{{ $qa->getAnswers()->count() }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-outline-warning border" href='{{ route("insert.qa.edit.get",["qa"=>$qa]) }}' >edit</a>
                                <a class="info btn btn-sm btn-outline-info border" href="{{ route('qa.show',['qa'=>$qa]) }}">info</a>
                                <a class="btn btn-sm btn-outline-danger border disabled" disabled="disabled" href="">del</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="col">
            {{ $qas->links() }}
        </div>
    </div>
@endsection

<?php

namespace App\Http\Controllers;
use App\Word;
use Illuminate\Http\Request;
use SweetAlert;

class WordController extends Controller
{
    public function index(){
        return view('index');
    }

    public function insertWordGet(){
        return view('createWord');
    }

    public function InsertWordPost(Request $request){
        $inputs=$request->except('_token');
        $sentences=explode('-',$inputs['sentence']);
        $persians=explode('-',$inputs['persian']);
        $tags=explode('-',$inputs['tag']);
        $word=Word::create(
            [
                'english'=>$inputs['english'],
                'persian'=>$persians,
                'sentence'=>$sentences,
                'tag'=>$tags,
                'lesson'=>$inputs['lesson']]
        );
        $title=$inputs['english'];
        $message='word  '.$inputs['english'].'  saved ...';
        alert()->success($message, $title);
        return back();
    }

    public function study(){
        $words=Word::all();
        return view('studyWords');
    }
}

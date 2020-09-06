<?php

namespace App\Http\Controllers;
use App\Traits\ResponseAjax;
use App\Word;
use Illuminate\Http\Request;
use SweetAlert;

class WordController extends Controller
{
    use ResponseAjax;

    public function translateGet(){
        return view('translate');
    }

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
        $words=Word::select('english','id','persian','state')->paginate(20);
        return view('studyWords',compact('words'));
    }
}

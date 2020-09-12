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
        //return $request->all();

        // variables...
        $inputs=$request->except('_token');
        $sentences=explode('-',$inputs['sentence']);
        $persians=explode('-',$inputs['persian']);
        $tags=explode('-',$inputs['tag']);
        $lesson=$inputs['lesson'];
        $english=$inputs['english'];

        //save words...
        $word=Word::create(['english'=>$english]);

        //save relations one to one...
        $word->Lesson()->create(['lesson'=>$lesson]);
        $word->Detail()->create();
        //save relations one many
        foreach ($persians as $persian)
            $word->Persians()->create(['persian'=>$persian]);
        foreach ($tags as $tag)
            $word->Tags()->create(['tag'=>$tag]);
        foreach ($sentences as $sentence)
            $word->Sentences()->create(['sentence'=>$sentence]);
        //messages...
        $title=$english;
        $message='word  '.$inputs['english'].'  saved ...';
        alert()->success($message, $title);
        return back();
    }

    public function study(){
        $words=Word::select('english','id','persian','state')->paginate(20);
        return view('studyWords',compact('words'));
    }
}

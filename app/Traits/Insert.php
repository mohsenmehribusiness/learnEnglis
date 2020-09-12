<?php

namespace App\Traits;
use App\Detail;
use App\sentence;
use App\Tag;
use App\Word;
use Illuminate\Http\Request;

trait Insert
{

    public function InsertLesson(Request $request){
        return $request;
    }
    private function getDetails(){
        $details=array();
        $details['wordCount']=Word::all()->count();
        $details['sentenceCount']=sentence::all()->count();
        $details['tags']=Tag::all()->count();
        $details['repeat']=Detail::select('repeat')->sum('repeat');
        return $details;
    }

    public function insert(){
        $details=$this->getDetails();
        return view('insert.insert',compact('details'));
    }

    public function insertWord(Request $request){
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

    public function insertSentence(Request $request){
        // variables...
        $inputs=$request->except('_token');
        $sent=$inputs['sentence'];
        $persian=$inputs['persian'];
        $tags=explode('-',$inputs['tag']);
        $lesson=$inputs['lesson'];
        //save relations one to on`e...
        $sentence=sentence::create(['sentence'=>$sent]);
        $sentence->Lesson()->create(['lesson'=>$lesson]);
        $sentence->Persians()->create(['persian'=>$persian]);
        $sentence->Detail()->create();
        //save relations one many
        foreach ($tags as $tag)
            $sentence->Tags()->create(['tag'=>$tag]);
        //messages...
        $title=$english;
        $message='word  '.$inputs['english'].'  saved ...';
        alert()->success($message, $title);
        return back();
    }

}

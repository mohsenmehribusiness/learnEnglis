<?php

namespace App\Traits;
use App\Detail;
use App\Http\Requests\LessonRequest;
use App\Http\Requests\SentenceRequest;
use App\Http\Requests\WordRequest;
use App\Lesson;
use App\sentence;
use App\Tag;
use App\Word;
use Illuminate\Http\Request;

trait Insert
{
    use PrivateFunctionInsert;

    public function InsertLesson(LessonRequest $request){
        Lesson::create([
            'lesson'=>$request->lesson,
            'description'=>$request->description
        ]);
        alert()->success('saved lesson',$request->lesson);
        return redirect()->route('insert');
    }

    public function insert(){
        $details=$this->getDetails();
        return view('insert.insert',compact('details'));
    }

    public function insertWord(WordRequest $request){
        $this->usage='word';
        $inputs=$request->except('_token');
        $persians=$this->explodeArray($inputs['persian']);

        //save english word
        $english=$inputs['english'];
        $word=Word::create(['english'=>$english]);

       //save details
        $word->Detail()->create(['usage'=>$this->usage]);

        //save relations one many [persians , tags , sentences]
        $this->SaveOneToMany($word,$persians,'Persians','persian');
        if(!is_null($inputs['tag'])){
            $tags=$this->explodeArray($inputs['tag']);
            $this->SaveOneToMany($word,$tags,'Tags','tag');
        }
        if(!is_null($inputs['sentence'])){
            $sentences=$this->explodeArray($inputs['sentence']);
            $this->SaveOneToMany($word, $sentences, 'Sentences', 'sentence');
        }
        //save lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $word->Lessons()->sync($lessons);
        }

        //messages...
        $title=$english;
        $message='word  '.$inputs['english'].'  saved ...';
        alert()->success($message, $title);
        return back();
    }

    public function insertSentence(SentenceRequest $request){
        $this->usage='sentence';
        $inputs=$request->except('_token');
        $persians=$this->explodeArray($inputs['persian']);
        //save english word
        $sentence=sentence::create(['sentence'=>$inputs['sentence'],'usage'=>$this->usage]);

        //save details
        $sentence->Detail()->create(['usage'=>$this->usage]);

        //save relations one many [persians , tags , sentences]
        $this->SaveOneToMany($sentence,$persians,'Persians','persian');
        if(!is_null($inputs['tag'])){
            $tags=$this->explodeArray($inputs['tag']);
            $this->SaveOneToMany($sentence,$tags,'Tags','tag');
        }
        //save lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $sentence->Lessons()->sync($lessons);
        }

        //messages...
        alert()->success($inputs['sentence'],'saved');
        return redirect()->route('insert');
    }


}

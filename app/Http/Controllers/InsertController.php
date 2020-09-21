<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Http\Requests\SentenceRequest;
use App\Http\Requests\WordRequest;
use App\Lesson;
use App\Persian;
use App\sentence;
use App\Tag;
use App\Traits\PrivateFunctionInsert;
use App\Word;
use Illuminate\Http\Request;

class InsertController extends Controller
{
    use PrivateFunctionInsert;

    public function insert(){
        $details=$this->getDetails();
        return view('insert.insert',compact('details'));
    }

    public function InsertLesson(LessonRequest $request){
        Lesson::create([
            'lesson'=>$request->lesson,
            'description'=>$request->description
        ]);
        alert()->success('saved lesson',$request->lesson);
        return redirect()->route('insert');
    }

    public function insertWord(WordRequest $request){
        $this->usage='word';
        $inputs=$this->makeInputs($request);

        //save english word
        $english=$inputs['word'];
        $word=Word::create(['word'=>$english]);
        //save details

        //save persian
        $persians=$this->makeListId($this->explodeArray($inputs['persian']),new Persian(),'persian');
        $word->Persians()->sync($persians);

        //save tag
        if(!is_null($inputs['tag'])){
            $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
            $word->Tags()->sync($tags);
        }

        //save sentence
        if(!is_null($inputs['sentence'])){
            $sentences=$this->explodeArray($inputs['sentence']);
            $this->SaveOneToMany($word, $sentences, 'Sentences', 'sentence');
        }

        //save lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $word->Lessons()->sync($lessons);
        }

        alert('word saved',$english);
        return back();
        //messages...
    }


    public function insertSentence(SentenceRequest $request){
        $this->usage='sentence';
        $inputs=$request->except('_token');

        //save english sentence
        $sentence=sentence::create(['sentence'=>$inputs['sentence'],'usage'=>$this->usage]);

        //save details
        $sentence->Detail()->create(['usage'=>$this->usage]);

        //save persian
        $persians=$this->makeListId($this->explodeArray($inputs['persian']),new Persian(),'persian');
        $sentence->Persians()->sync($persians);

        //save tag
        if(!is_null($inputs['tag'])){
            $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
            $sentence->Tags()->sync($tags);
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

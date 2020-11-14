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

    Private function saveWord($inputs){
        $this->usage='word';
        //save english word
        if($inputs['word']==null)
            return null;
        $english=$inputs['word'];
        $word=Word::firstOrCreate(['word'=>$english]);
        //save details
        $word->Detail()->updateOrCreate(['usage'=>$this->usage]);
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
            $sentences=$this->makeListId($this->explodeArray($inputs['sentence']),new sentence(),'sentence');
            $word->Sentences()->sync($sentences);
        }

        /*//save sentence
        if(!is_null($inputs['sentence'])){
            $sentences=$this->explodeArray($inputs['sentence']);
            $this->SaveOneToMany($word, $sentences, 'Sentences', 'sentence');
        }*/

        //save lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $word->Lessons()->sync($lessons);
        }

        return $word;
    }

    public function insertWord(WordRequest $request){
        $inputs=$this->makeInputs($request);
        $this->saveWord($inputs);
        alert('word saved','word saved');
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

    //insert Lesson
    public function InsertLesson(LessonRequest $request){
        Lesson::create([
            'lesson'=>$request->lesson,
            'description'=>$request->description
        ]);
        alert()->success('saved lesson',$request->lesson);
        return redirect()->route('insert');
    }
    public function InsertLessonGet(){
        return view('insert.lesson.insertLesson');
    }


    // multi word save
    public function insertMultiWord()
    {
        return view('insert.multi.insertMultiWord');
    }

    public function insertMultiWordPost(Request $requests)
    {
        $requests=$this->makeInputs($requests);
        foreach ($requests as $request){
            $this->saveWord($request);
        }
        alert('words saved','done');
        return back();
    }

    // multi sentence save
    Private function saveSentence($inputs){
        $this->usage='sentence';

        if($inputs['sentence']==null)
            return null;
        //save english sentence
        $english=$inputs['sentence'];
        $sentence=sentence::firstOrCreate(['sentence'=>$english]);

        //save details
        $sentence->Detail()->updateOrCreate(['usage'=>$this->usage]);

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

        return $sentence;
    }

    public function insertMultiSentence()
    {
        return view('insert.multi.insertMultiSentence');
    }

    public function insertMultiSentencePost(Request $requests)
    {
        $requests=$this->makeInputs($requests);
        foreach ($requests as $request){
            $this->saveSentence($request);
        }
        alert('sentences saved','done');
        return back();
    }
}

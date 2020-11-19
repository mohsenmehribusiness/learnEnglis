<?php
namespace App\Traits\Insert;
use App\Http\Requests\WordRequest;
use App\Persian;
use App\sentence;
use App\Tag;
use App\Word;
use Illuminate\Http\Request;
trait wordInsertTrait
{
    Private function saveWord($inputs){
        $this->usage='word';
        //save english word
        if($inputs['word']==null)
            return null;
        $word=Word::firstOrCreate(['word'=>$inputs['word']]);
        //save details
        $word->detail()->updateOrCreate(['usage'=>$this->usage]);
        //save persian
        $persians=$this->makeListId($this->explodeArray($inputs['persian']),new Persian(),'persian');
        $word->persians()->sync($persians);
        //save tag
        if(isset($inputs['tag'])){
            $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
            $word->tags()->sync($tags);
        }
        //save sentence
        if(isset($inputs['sentence'])){
            $sentences=$this->makeListId($this->explodeArray($inputs['sentence']),new sentence(),'word');
            $word->sentences()->sync($sentences);
        }

        /*//save sentence
        if(!is_null($inputs['sentence'])){
            $sentences=$this->explodeArray($inputs['sentence']);
            $this->SaveOneToMany($word, $sentences, 'Sentences', 'sentence');
        }*/

        //save lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $word->lessons()->sync($lessons);
        }

        return $word;
    }
    public function insertWordPost(WordRequest $request){
        $inputs=$this->makeInputs($request);
        $this->saveWord($inputs);
        alert('word saved','word saved');
        return back();
        //messages...
    }
    // multi word save
    public function insertMultiWordGet()
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

    ############
    // edit word
    public function editWordGet(Word $word)
    {
        return view('insert.edit.word',compact('word'));
    }
    public function editWordPost(Request $request)
    {
        //return $request->all();
        $inputs=$this->makeInputs($request);
        $this->editWord($inputs);
        alert('edit done','done');
        return redirect()->route('home');
    }
    public function editWord($inputs)
    {
        $this->setUsage('word');
        if(!$inputs['word'])
            return null;
        //edit word
        $word=Word::find($inputs['id']);
        $word->update(['word'=>$inputs['word']]);
        //edit persian
        $persians=$this->makeListId($this->explodeArray($inputs['persian']),new Persian(),'persian');
        $word->persians()->sync($persians);
        //edit tag
        $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
        $word->tags()->sync($tags);
        //edit sentence
        $sentences=$this->makeListId($this->explodeArray($inputs['sentence']),new sentence(),'word');
        $word->sentences()->sync($sentences);
        //edit lessons
        $lessons = isset($inputs['lesson']) ? $inputs['lesson'] : null;
        $word->lessons()->sync($lessons);
        return $word;
    }
    // edit word
}

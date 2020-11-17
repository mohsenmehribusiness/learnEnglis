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
}

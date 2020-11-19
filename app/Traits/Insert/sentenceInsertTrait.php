<?php
namespace App\Traits\Insert;
use App\Http\Requests\SentenceRequest;
use App\Persian;
use App\sentence;
use App\Tag;
use Illuminate\Http\Request;
trait sentenceInsertTrait
{
    public function insertSentencePost(SentenceRequest $request){
        $inputs=$this->makeInputs($request);
        $this->saveSentence($inputs);
        //messages...
        alert()->success($inputs['sentence'],'saved');
        return redirect()->route('insert');
    }
    // multi sentence save
    Private function saveSentence($inputs){
        $this->usage='sentence';
        if($inputs['sentence']==null)
            return null;
        //save english sentence
        $english=$inputs['sentence'];
        $sentence=sentence::firstOrCreate(['word'=>$english]);

        //save details
        $sentence->detail()->updateOrCreate(['usage'=>$this->usage]);

        //save persian
        $persians=$this->makeListId($this->explodeArray($inputs['persian']),new Persian(),'persian');
        $sentence->persians()->sync($persians);
        //save tag
        if(isset($inputs['tag'])){
            $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
            $sentence->tags()->sync($tags);
        }

        //save lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $sentence->lessons()->sync($lessons);
        }

        return $sentence;
    }
    public function insertMultiSentenceGet()
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
    ################
    // edit sentence
    public function editSentenceGet(sentence $word)
    {
        return view('insert.edit.sentence',compact('word'));
    }
    public function editSentencePost(Request $request)
    {
        //return $request->all();
        $inputs=$this->makeInputs($request);
        $this->editSentence($inputs);
        alert('edit sentence done','done');
        return redirect()->route('home');
    }
    public function editSentence($inputs){
        $this->setUsage('sentence');
        if(!$inputs['word'])
            return null;
        //save english sentence
        $sentence=sentence::find($inputs['id']);
        $sentence->update(['word'=>$inputs['word']]);
        //edit persian
        $persians=$this->makeListId($this->explodeArray($inputs['persian']),new Persian(),'persian');
        $sentence->persians()->sync($persians);
        //edit tag
        $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
        $sentence->tags()->sync($tags);
        //edit lessons
        $lessons = isset($inputs['lesson']) ? $inputs['lesson'] : null;
        $sentence->lessons()->sync($lessons);
        return $sentence;
    }
    // edit sentence
}

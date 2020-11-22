<?php
namespace App\Traits\Qa;
use App\Qa;
use App\Tag;
use Illuminate\Http\Request;

trait QaInsertTrait
{
    public function insertQaGet()
    {
        return view('insert.qa.qa');
    }
    private function saveQa($inputs){
        // save snetences questions and answers
        $listQuestionsId=Qa::saveQuestions($inputs['questions']);
        $listAnswersId=Qa::saveAnswers($inputs['answers']);
        //save qa
        $qa=Qa::create([
            'answers'=>$listAnswersId,
            'questions'=>$listQuestionsId,
            'title'=>$inputs['title'],
            'description'=>$inputs['description']
        ]);
        //save detail
        //save details
        $qa->detail()->updateOrCreate(['usage'=>'qa']);

        //save lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $qa->lessons()->sync($lessons);
        }
        //save tags
        $tags=$this->makeListId($this->explodeArray($inputs['tags']),new Tag(),'tag');
        $qa->tags()->sync($tags);
    }
    public function insertQaPost(Request $request)
    {
        $inputs=$this->makeInputs($request);
        $this->saveQa($inputs);
        alert()->success('question answer save','QA saved');
        return redirect()->route('qa.index');
        //return redirect()->route('lesson.table.index');
    }

    // edit qa
    public function editQaGet(Qa $qa)
    {
        return view('insert.edit.qa',compact('qa'));
    }
    public function editQaPost(Request $request)
    {
        $inputs=$this->makeInputs($request);
        $this->editQa($inputs);
        alert()->success('edit qa done','done');
        return redirect()->route('qa.index');
    }
    public function editQa($inputs)
    {
        // edit sentences questions and answers
        $listQuestionsId=Qa::saveQuestions($inputs['questions']);
        $listAnswersId=Qa::saveAnswers($inputs['answers']);
        //edit qa
        $qa=Qa::find($inputs['id']);
        $qa->update(
            [
                'answers'=>$listAnswersId,
                'questions'=>$listQuestionsId,
                'title'=>$inputs['title'],
                'description'=>$inputs['description']
            ]);
        //edit lessons
        if(isset($inputs['lesson'])) {
            $lessons = $inputs['lesson'];
            $qa->lessons()->sync($lessons);
        }
        //edit tags
        $tags=$this->makeListId($this->explodeArray($inputs['tags']),new Tag(),'tag');
        $qa->tags()->sync($tags);
    }
    // edit qa

}

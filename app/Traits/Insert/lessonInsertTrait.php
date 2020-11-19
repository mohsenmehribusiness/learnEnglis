<?php
namespace App\Traits\Insert;
use App\Http\Requests\LessonRequest;
use App\Lesson;
use App\Tag;
trait lessonInsertTrait
{
    public function saveLesson($inputs)
    {
        $lesson=Lesson::updateOrCreate([
            'lesson'=>$inputs['lesson'],
            'description'=>$inputs['description']
        ]);
        //save tags
        if(isset($inputs['tag'])){
            $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
            $lesson->tags()->sync($tags);
        }
    }
    //insert Lesson
    public function InsertLessonPost(LessonRequest $request){
        $inputs=$this->makeInputs($request);
        $this->saveLesson($inputs);
        alert()->success('saved lesson',$request->lesson);
        return redirect()->route('insert');
    }
    public function InsertLessonGet(){
        return view('insert.lesson.insertLesson');
    }

    // edit lesson
    public function editLessonGet(Lesson $lesson)
    {
        return view('insert.edit.lesson',compact('lesson'));
    }
    public function editLessonPost(LessonRequest $request)
    {
        $inputs=$this->makeInputs($request);
        $this->editLesson($inputs);
        alert('edit lesson done','done');
        return redirect()->route('home');
    }
    public function editLesson($inputs)
    {
        $lesson=Lesson::find($inputs['id']);
        $lesson->update([
            'lesson'=>$inputs['lesson'],
            'description'=>$inputs['description']
        ]);
        $tags=$this->makeListId($this->explodeArray($inputs['tag']),new Tag(),'tag');
        $lesson->tags()->sync($tags);
    }
    // edit lesson

}

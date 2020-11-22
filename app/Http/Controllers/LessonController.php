<?php
namespace App\Http\Controllers;
use App\Traits\Lesson\lessonOrderTrait;
use App\Lesson;
use App\Traits\CacheTrait;
use App\Traits\TagPrivateFunction;
use Illuminate\Http\Request;

class LessonController extends Controller {
    use TagPrivateFunction,CacheTrait,lessonOrderTrait;
    public function index()
    {
        $objects=Lesson::paginate(15);
        $general='lesson';
        return view('tags.indexShowTable',compact('objects','general'));
    }
    public function lessonLetter(){
        $objects=new Lesson();
        $letters=$this->productLetters();
        $general='lesson';
        return view('tags.index',compact('objects','letters','general'));
    }
    public function lesson($lesson){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newLessonQuery',$lesson);
        $key='lesson';
        $query=$lesson;
        return view('study.index',compact('key','query','routes'));
    }
    public function lessonSentence($lesson){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newLessonQuery',$lesson);
        $this->changeChoose('sentences');
        $key='lesson';
        $query=$lesson;
        return redirect()->route('lesson.lesson',['lesson'=>$lesson]);
    }
    public function lessonWord($lesson){
        $routes=$this->setRoutes();
        $this->setCacheQuery('newLessonQuery',$lesson);
        $this->changeChoose('words');
        $key='lesson';
        $query=$lesson;
        return redirect()->route('lesson.lesson',['lesson'=>$lesson]);
    }
    //ajax
    public function lessonInfo(Request $request)
    {
        $lesson=Lesson::find($request->id);
        return response()->json(array('lesson'=>$lesson->lesson,'description'=>$lesson->description),200);
    }
}

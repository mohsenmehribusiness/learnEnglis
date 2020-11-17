<?php
namespace App\Http\Controllers;
use App\Traits\Lesson\lessonOrderTrait;
use App\Lesson;
use App\Traits\CacheTrait;
use App\Traits\TagPrivateFunction;

class LessonController extends Controller {
    use TagPrivateFunction,CacheTrait,lessonOrderTrait;

    public function index(){
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

    public function indexTable()
    {
        $objects=Lesson::paginate(15);
        $general='lesson';
        return view('tags.indexShowTable',compact('objects','general'));
    }
}

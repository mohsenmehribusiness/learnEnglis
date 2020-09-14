<?php

namespace App\Http\Controllers;
use App\Lesson;
use App\Traits\TagPrivateFunction;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    use TagPrivateFunction;

    public function index(){
        $objects=new Lesson();
        $letters=$this->productLetters();
        $general='tag';
        return view('lesson.index',compact('objects','letters','general'));
    }

    public function tag($tag){
        return Lesson::FindLesson($tag)->first();
    }
}

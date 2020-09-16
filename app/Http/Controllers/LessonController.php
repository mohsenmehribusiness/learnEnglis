<?php

namespace App\Http\Controllers;
use App\Lesson;
use App\Traits\TagPrivateFunction;
use App\Word;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    use TagPrivateFunction;

    public function index(){
        $objects=new Lesson();
        $letters=$this->productLetters();
        $general='lesson';
        return view('tags.index',compact('objects','letters','general'));
    }

    public function lesson($lesson){
        $lesson=Lesson::FindLesson($lesson)->first();
        $words=$lesson->words()->paginate(20);
        return view('study.index',compact('words'));

    }
}

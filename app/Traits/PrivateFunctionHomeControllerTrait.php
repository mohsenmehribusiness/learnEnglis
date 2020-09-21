<?php


namespace App\Traits;


use App\Detail;
use App\Lesson;
use App\sentence;
use App\Tag;
use App\Word;

trait PrivateFunctionHomeControllerTrait
{

    private function getIcons(){
        return ['fa-repeat','fa-graduation-cap','fa-tag','fa-quote-right ','fa-file-word-o'];
    }

    private function getDetails(){
        $details=array();
        $details['word']=Word::all()->count();
        $details['sentences']=sentence::all()->count();
        $details['tags']=Tag::all()->count();
        $details['lessons']=Lesson::all()->count();
        $details['repeat']=Detail::select('repeat')->sum('repeat');
        return $details;
    }
}

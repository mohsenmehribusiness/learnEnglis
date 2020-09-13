<?php


namespace App\Traits;


use App\Detail;
use App\Lesson;
use App\sentence;
use App\Tag;
use App\Word;

trait PrivateFunctionInsert
{
    public $usage=null;
    private function getDetails(){
        $details=array();
        $details['wordCount']=Word::all()->count();
        $details['sentenceCount']=sentence::all()->count();
        $details['tags']=Tag::all()->count();
        $details['lessons']=Lesson::all()->count();
        $details['repeat']=Detail::select('repeat')->sum('repeat');
        return $details;
    }

    private function explodeArray($var){
        return explode('-',$var);
    }

    private function SaveOneToMany($modal,$items,$relation,$type){
        foreach ($items as $item)
            $modal->$relation()->create(["{$type}"=>$item,'usage'=>$this->usage]);
    }
}

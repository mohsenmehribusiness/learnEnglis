<?php
namespace App\Traits;
use App\Detail;
use App\Lesson;
use App\sentence;
use App\Tag;
use App\Persian;
use App\Word;
use Illuminate\Http\Request;

trait PrivateFunctionInsert
{
    public $usage='word';

    /**
     * @param Request $request
     * @return array
     */
    private function makeInputs(Request $request){
        return $request->except('_token');
    }

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

    private function createOrExist($object,$modal,$key){
        return (($find=$modal::where($key,$object)->first())? $object=$find : $object=$modal::create(["{$key}"=>$object]))->id;
        //return ($modal::firstOrCreate(["{$key}"=>$object]))->id;
    }

    private function makeListId($objects,$modal,$key){
        $list=array();
        foreach($objects as $object) {
            //array_push($list, $this->createOrExist($object, $modal, $key));
            array_push($list,($modal::firstOrCreate(["{$key}"=>$object]))->id);
        }
        return $list;
    }
}

<?php
namespace App\Traits;
use App\Detail;
use App\Lesson;
use App\sentence;
use App\Tag;
use App\Word;
use Illuminate\Http\Request;

trait PrivateFunctionInsert
{
    public $usage=null;

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

    private function createOrExistTag($tag){
        $find=null;
        ($find=Tag::FindTag($tag)->first())? $tag=$find : $tag=Tag::create(['tag'=>$tag,'usage'=>$this->usage]);
        return $tag->id;
    }

    private function makeListTagsId($tags){
        $ar=array();
        foreach($tags as $tag)
            array_push($ar,$this->createOrExistTag($tag));
        return $ar;
    }

}

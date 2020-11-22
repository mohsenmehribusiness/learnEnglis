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
    public function setUsage($usage)
    {
        $this->usage=$usage;
    }
    private function makeInputs(Request $request){
        return $request->except('_token');
    }
    private function explodeArray($var){
        return $var ? array_map('trim', explode('-',$var)) : null;
    }
    private function SaveOneToMany($modal,$items,$relation,$type){
        foreach ($items as $item)
            $modal->$relation()->create(["{$type}"=>$item,'usage'=>$this->usage]);
    }
    private function makeListId($objects,$modal,$key){
        $list=array();
        if(!$objects)
            return null;
        foreach($objects as $object) {
            array_push($list,($modal::firstOrCreate(["{$key}"=>$object]))->id);
        }
        return $list;
    }
}

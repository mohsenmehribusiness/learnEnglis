<?php

namespace App\Traits;
use App\Word;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

trait ResponseAjax
{
    public function translatePost(Request $request){
        $source='en';
        $target='fa';
        $text=$request->text;
        $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
        $request->source=='english' ? $source='en' : $source='fa';
        $request->target=='english' ? $target='en' : $target='fa';
        $tr->setSource($source);
        $tr->setSource();
        $tr->setTarget($target);
        $translate=$tr->translate($text);
        return response()->json(array('translate'=>$translate), 200);
    }

    public function checkstate(Request $request){

        $word=Word::find($request->id);

        $word->update([
            'state'=>!$word->state
        ]);
        return response()->json(array('state'=> $word->state), 200);
    }

    public function getInformationWord(Request $request){
        $word=Word::find($request->id);
        return response()->json(array('word'=> $word), 200);
    }
}

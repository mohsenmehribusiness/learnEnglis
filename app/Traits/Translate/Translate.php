<?php
namespace App\Traits\Translate;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
trait Translate
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
}

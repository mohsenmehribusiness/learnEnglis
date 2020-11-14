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
        $details=
        [
            'word'=>Word::all()->count(),
            'sentences'=>sentence::all()->count(),
            'tags'=>Tag::all()->count(),
            'lessons'=>Lesson::all()->count(),
            'repeat'=>Detail::select('repeat')->sum('repeat')
        ];
        return $details;
    }
}

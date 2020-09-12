<?php


namespace App\Traits;
use App\Word;

trait Study
{
    public function study(){
        $words=Word::select('english','id','persian','state')->paginate(20);
        return view('studyWords',compact('words'));
    }

}

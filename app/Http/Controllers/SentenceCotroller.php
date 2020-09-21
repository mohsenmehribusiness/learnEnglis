<?php
namespace App\Http\Controllers;
use App\sentence;
use Illuminate\Http\Request;

class SentenceCotroller extends Controller
{
    public function index(){
        $words=Sentence::select('sentence as word','id')->with('persians')->paginate(20);
        //return $words;
        return view('study.index',compact('words'));
    }

    public function word($word){
        return Word::FindWord($word)->first();
    }
}

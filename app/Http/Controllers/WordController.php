<?php
namespace App\Http\Controllers;
use App\Tag;
use App\Traits\ResponseAjax;
use App\Traits\Study;
use App\Word;
use SweetAlert;

class WordController extends Controller
{
    use ResponseAjax;

    public function index(){
        $words=Word::select('word','id')->paginate(20);
        return view('study.index',compact('words'));
    }

    public function word($word){
        return Word::FindWord($word)->first();
    }


}

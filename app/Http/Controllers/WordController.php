<?php
namespace App\Http\Controllers;
use App\Traits\ResponseAjax;
use App\Traits\Study;
use App\Word;
use SweetAlert;

class WordController extends Controller
{
    use ResponseAjax;
    public function index(){
        return view('index');
    }

    public function word($word){
        return Word::FindWord($word)->with('lessons')->with('tags')->get();
    }


}

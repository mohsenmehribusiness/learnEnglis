<?php
namespace App\Http\Controllers;
use App\Traits\FunctionPrivateWordControllerTrait;
use App\Word;
use SweetAlert;

class WordController extends Controller
{
    use FunctionPrivateWordControllerTrait;
    public function index(){
        $words=Word::select('word','id')->paginate(20);
        return view('study.index',compact('words'));
    }

    public function word($word){
        return Word::FindWord($word)->first();
    }

    //ajax
    public function checkstate(\Illuminate\Http\Request $request){
        $detail=\App\Detail::where('foreign_id',$request->id)->first();
        $detail->update([
            'state'=>!$detail->state
        ]);
        return response()->json(array('state'=> $detail->state), 200);
    }
}

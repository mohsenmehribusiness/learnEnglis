<?php

namespace App\Http\Controllers;
use App\Detail;
use App\Traits\Study;
use App\Word;
use Illuminate\Http\Request;

class StudyController extends Controller
{
    use Study;

    public function index(){
        $words=Word::select('word','id')->paginate(20);
        return view('study.index',compact('words'));
    }


    public function checkstate(Request $request){
        $detail=Detail::where('foreign_id',$request->id)->first();
        $detail->update([
            'state'=>!$detail->state
        ]);
        return response()->json(array('state'=> $detail->state), 200);
    }

    public function getInformationWord(Request $request){
        $wordMain=Word::find($request->id);
        $word['english']=$wordMain->word;
        $word['persian']=$wordMain->persians()->get();
        $word['sentences']=$wordMain->sentences()->get();
        return response()->json(array('word'=> $word), 200);
    }
}

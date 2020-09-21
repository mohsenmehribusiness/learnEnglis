<?php
namespace App\Http\Controllers;
use App\Detail;
use App\Traits\Study;
use App\Word;
use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

class StudyController extends Controller
{
    use Study;
    public function index(){
        $words=Word::select('word','id')->get();
        return Datatables::eloquent(Word::query())->make(true);
        $words=$this->paginate($words,12);
        return view('study.index',compact('words'));
    }

    public function getInformationWord(Request $request){
        $wordMain=Word::find($request->id);
        $word['english']=$wordMain->word;
        $word['persian']=$wordMain->persians()->get();
        $word['sentences']=$wordMain->sentences()->get();
        return response()->json(array('word'=> $word), 200);
    }
}

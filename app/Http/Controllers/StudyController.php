<?php
namespace App\Http\Controllers;
use App\Detail;
use App\Traits\Study;
use App\Word;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudyController extends Controller
{
    use Study;
    public function index(){
        $route="study.data";
        return view('study.index',compact('route'));
    }

    public function AjaxQueryData(Request $request){
        return Datatables::of(Word::query())


            ->setRowId(function ($user) {
            return $user->id;
        })

        ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
        ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
        ->make(true);
    }

    public function getInformationWord(Request $request){
        $wordMain=Word::find($request->id);
        $word['english']=$wordMain->word;
        $word['persian']=$wordMain->persians()->get();
        $word['sentences']=$wordMain->sentences()->get();
        return response()->json(array('word'=> $word), 200);
    }
}

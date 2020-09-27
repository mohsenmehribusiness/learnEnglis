<?php
namespace App\Http\Controllers;
use App\Traits\FunctionPrivateWordControllerTrait;
use App\Word;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class WordController extends Controller
{
    use FunctionPrivateWordControllerTrait;
    public function index(){
        $route="study.data";
        return view('study.index',compact('route'));
    }

    public function AjaxQueryData(Request $request){
        return Datatables::of(Word::StateCheck())
            ->setRowId(function ($user) {
                return $user->id;
            })
            ->addColumn('persian', function(Word $word){return view('study.yajra.persianColumn',compact('word'));})
            ->addColumn('setting', function(Word $word){return view('study.yajra.settingColumn',compact('word'));})
            ->make(true);
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
